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

Route::group(['as' => 'home'], function()
{
    Route::get('/home', 'HomeController@index');

    Route::get('/', 'HomeController@index');
});

Route::group(['as' => 'lead'], function()
{
    Route::get('/lead-register', 'Auth\AuthController@lead_index');

    Route::post('/lead-register', 'Auth\AuthController@lead_register');

    Route::get('/lead/{id}', 'Lead\LeadController@showLeadCart');
});

Route::group(['as' => 'settings'], function()
{
    Route::get('/settings', 'User\SettingController@index');

    Route::post('/settings', 'User\SettingController@edit');
});
