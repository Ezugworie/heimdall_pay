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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

#generate app key
$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});

$router->get('/users', 'UserController@index');
$router->get('/wallets', 'WalletController@index');
$router->get('/wallets/debit', 'WalletController@debitWallet');
$router->get('/wallets/credit', 'WalletController@creditWallet');

