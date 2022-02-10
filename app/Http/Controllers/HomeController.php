<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use App\Models\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
