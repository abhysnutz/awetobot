<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use App\Models\Installation;
use App\Models\Session;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Artisan;

class AuthController extends Controller
{
    public function __construct()
    {
        //
    }
    
    public function index(){
        $client_ip = $this->getIp() ?? null;
        $hardware_id = str_replace('UUID: ','',trim(shell_exec('sudo dmidecode -t system | grep UUID')));
        $public_ip = trim(shell_exec('dig +short myip.opendns.com @resolver1.opendns.com'));
        $tunnel_ip = explode('/',trim(str_replace('IP4.ADDRESS[1]:','',shell_exec('sudo nmcli con show tun0 | grep IP4.ADDRESS'))))[0];
        
        $bot = Bot::first();
        if($bot){
            if($bot->status == 'APPROVED'){
                $session = Session::where('ip_address', $this->getIp())->count();
                if($session){
                    return view('dashboard', compact('hardware_id','public_ip','tunnel_ip','bot'));
                }else{
                    return view('login', compact('hardware_id','public_ip','tunnel_ip','bot'));
                }
            }else{
                return view('register', compact('hardware_id','public_ip','tunnel_ip'));
            }
        }else{
            return view('register', compact('hardware_id','public_ip','tunnel_ip'));
        }
    }

    public function getBot(){
        $result = [];

        $result['status'] = 'PENDING PAIRING';
        $bot = Bot::first();
        
        if($bot){
            $result['status'] = $bot['status'];
            $result['bot_id'] = $bot['id'];
        }

        return response()->json($result,200);
    }
    
    public function pairCode(Request $request){
        $url = "https://awetonet-dev.dv9.com/api/awetobot/paircode";
        $myResult = [];
        $myResult['status'] = 0;

        $client = new Client();
        $response = $client->request('POST', $url, [
            'query' => $request->all(),
        ]);
        
        if($response->getBody()){
            $result = json_decode($response->getBody(),true);
            if($result['status'] == 1) {
                $botData = $result['botdata'];
                $botData['id'] = $result['botdata']['bot_id'];
                $botData['site_name'] = $result['site_name'];

                $bot = Bot::create($botData);

                if($bot){
                    $myResult['status'] = 1;
                }
            }
        }

        return response()->json($myResult,200);
    }

    public function checkApproval(Request $request){
        $url = "https://awetonet-dev.dv9.com/api/awetobot/approval";
        $myresult = [];
        $myresult['status'] = 0;
        
        $client = new Client();
        $response = $client->request('POST', $url, [
            'query' => $request->all()
        ]);
        
        $myresult['bot_status'] = 'PENDING APPROVAL';

        if($response->getBody()){
            $result = json_decode($response->getBody(),true);
            if($result['status'] == 1) {
                $myresult['bot_status'] = $result['bot_status'];
                $myresult['bot_id'] = $result['bot_id'];

                if($result['bot_status'] == 'APPROVED'){
                    installation::truncate();
                    Artisan::call('db:seed');
                    sleep(1);
                    $myresult['bot_status'] = 'PAIRING APPROVED';
                    $bot = Bot::find($result['bot_id']);
                    if($bot){
                        $bot->status = 'PAIRING APPROVED';
                        $bot->updated_at = \Carbon\Carbon::now();
                        if($bot->save()) $myresult['status'] = 1;
                    }
                }elseif($result['bot_status'] == 'DENY'){
                    $bot = Bot::find($request->bot_id);
                    if($bot){
                        if($bot->delete()){
                            $url = "https://awetonet-dev.dv9.com/api/awetobot/deny";

                            $client = new Client();
                            $response = $client->request('POST', $url, [
                                'query' => $request->all()
                            ]);

                            if($response->getBody()){
                                $result = json_decode($response->getBody(),true);
                                if($result['status'] == 1) {
                                    $myresult['status'] = 1;
                                }
                            }
                        }
                    }
                }else{
                    $myresult['bot_status'] = 'PENDING APPROVAL';
                    $myresult['status'] = 1;
                }
            }else{
                $myresult['status'] = 0;
            }
        }
        
        return response()->json($myresult,200);
    }

    public function restart(Request $request){
        $url = "https://awetonet-dev.dv9.com/api/awetobot/restart";
        
        $myresult = [];
        $myresult['status'] = 0;
        
        $client = new Client();
        $response = $client->request('POST', $url, [
            'query' => $request->all()
        ]);

        if($response->getBody()){
            $result = json_decode($response->getBody(),true);
            if($result['status'] == 1) {
                Bot::truncate();
                installation::truncate();
                Session::truncate();
                
                $myresult['status'] = 1;
            }else{
                $myresult['status'] = 0;
            }
        }

        return response()->json($myresult,200);
    }

    public function checkInstallation(Request $request){
        $url = "https://awetonet-dev.dv9.com/api/awetobot/pin";

        $myresult = [];
        $myresult['status'] = 0;

        $installCount = Installation::all()->count();
        $successCount = Installation::where('status',2)->count();

        if($installCount == $successCount){
            $myresult['progress'] = 'completed';
            $myresult['status'] = 1;

            Bot::where('id',$request->bot_id)->update(['status' => 'APPROVED']);
            
            $client = new Client();
            $client->request('POST', $url, [
                'query' => $request->all()
            ]);
        }else{
            $progressCount = Installation::where('status',1)->count();
            if(!$progressCount){
                $installation = Installation::where('status', 0)->first();
                $myresult['data'] = $installation;
                $myresult['progress'] = 'start';
            }else{
                $installation = Installation::where('status', 1)->first();
                $myresult['data'] = $installation;
                $myresult['progress'] = 'progress';
            }
            $myresult['status'] = 1;
        }

        return response()->json($myresult,200);
    }

    public function installation(Request $request){
        $myresult = [];
        $myresult['status'] = 0;
        
        sleep(4);
        installation::where('name', $request->name)->update(['status' => 2]);

        $myresult['status'] = 1;
        return response()->json($myresult,200);
    }

    public function successInstallation(){
        $myresult = [];
        $myresult['status'] = 0;

        $installation = Installation::where('status', 2)->get();

        if($installation){
            $myresult['data'] = $installation;
            $myresult['status'] = 1;
        }

        return response()->json($myresult,200);
    }

    public function authentication(Request $request){
        $url = "https://awetonet-dev.dv9.com/api/awetobot/authentication";

        $myresult = [];
        $myresult['status'] = 0;
        
        $client = new Client();
        $response = $client->request('POST', $url, [
            'query' => $request->all()
        ]);

        if($response->getBody()){
            $result = json_decode($response->getBody(),true);
            if($result['status'] == 1) {
                $session = Session::create(['ip_address' => $this->getIp()]);
                if($session) $myresult['status'] = 1;
            }else{
                echo 'fail';
            }
        }
       
        return response()->json($myresult,200);
    }

    public function logout(){
        Session::where('ip_address', $this->getIp())->delete();
    }

    function RemotePost($url, $data){

        $post_data = json_encode($data);
    
        $ch=curl_init();
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
    
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_VERBOSE, true);
    
        // post_data
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
        $response = curl_exec($ch);
    
        $RemoteResult = [];
        $RemoteResult['status'] = 0;
    
        if (!$response) {
            $body = curl_error($ch);
            $RemoteResult['error'] = "CURL Error: = " . $body;
        } else {
    
            $body = json_decode($response,true);
            $RemoteResult['status'] = 1;
            $RemoteResult['result'] = $body;
        }
        curl_close($ch);
    
        return $RemoteResult;
    }

    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }
}
