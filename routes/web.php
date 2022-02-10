<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

$router->post('getBot', ['as' => 'getBot', 'uses' => 'AuthController@getBot']);
$router->post('pairCode', ['as' => 'pairCode', 'uses' => 'AuthController@pairCode']);
$router->post('checkApproval', ['as' => 'checkApproval', 'uses' => 'AuthController@checkApproval']);
$router->post('restart', ['as' => 'restart', 'uses' => 'AuthController@restart']);
$router->post('checkInstallation', ['as' => 'checkInstallation', 'uses' => 'AuthController@checkInstallation']);
$router->post('installation', ['as' => 'installation', 'uses' => 'AuthController@installation']);
$router->post('successInstallation', ['as' => 'successInstallation', 'uses' => 'AuthController@successInstallation']);
$router->post('authentication', ['as' => 'authentication', 'uses' => 'AuthController@authentication']);
$router->post('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

$router->get('php', function () {
    phpinfo();
});
