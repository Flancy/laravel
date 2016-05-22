<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();

Route::get('register/{id}', 'Auth\AuthController@showRegistrationForm');

Route::group(['middleware' => 'company', 'as' => 'home'], function()
{
    Route::get('/home', 'HomeController@index');
});

Route::get('/',['middleware' => 'hasRole', 'uses' => 'Auth\AuthController@showLoginForm']);

Route::get('/lead-register', ['middleware' => 'guest', 'uses' => 'Auth\AuthController@lead_index']);

Route::post('/lead-register', ['uses' =>  'Auth\AuthController@lead_register']);

Route::group(['middleware' => 'lead', 'as' => 'lead'], function()
{
    Route::get('/lead/{id}', 'Lead\LeadController@showLeadCart');

    Route::get('/lead/{id}/info', 'Lead\LeadController@showLeadInfo');
});

Route::group(['middleware' => 'company', 'as' => 'settings'], function()
{
    Route::get('/settings', 'User\SettingController@index');

    Route::post('/settings', 'User\SettingController@edit');

    Route::post('/pay-lead', 'PayLeadConroller@store');
});
