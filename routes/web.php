<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('admin');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
     Route::get('/', 'LoginController@showLoginForm')->name('show:login');
     Route::post('login', 'LoginController@login')->name('admin.login');
    Route::any('logout', 'LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => 'admin.auth'], function () {
        //dashboard route
        Route::get('/dashboard', 'DashboardController@dashboard')->name('admin.dashboard');
        //agent create add update delete 
        Route::resource('agent', 'AgentController');
        //agent block 
        Route::post('isblock-agent', 'AgentController@isBlockAgent')->name('isblock-agent');
        //balence transfer route 
        Route::get('agent/balence/transfer' , 'AgentController@BalenceTransferHistory')->name('agent-balence-transfer');
        //create balence transfer 
        Route::get('create/agent/balence/transfer' , 'AgentController@createPaymentReceipt')->name('create-agent-balence-transfer');
        //store balence transfer
        Route::post('store/agent/balence/transfer' , 'AgentController@storePaymentReceipt')->name('store-agent-balence-transfer');
    });
});