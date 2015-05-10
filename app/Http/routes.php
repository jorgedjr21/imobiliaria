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

Route::get('/', [
    'as'=>'page.index',
    'uses'=>'HomeController@index'
]);

Route::get('home', [
    'as'=>'page.home',
    'uses'=>'HomeController@index'
]);

Route::get('login',
    [
        'as'=>'users.login',
        'uses'=>'UsersController@login',
    ]);

Route::post('login',
    [
        'as'=>'users.auth',
        'uses'=>'UsersController@authenticate',
    ]);

Route::get('logout',
    [
        'as'=>'users.logout',
        'uses'=>'UsersController@logout',
    ]);
/*

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/

Route::get('/users/register',
    [
        'as'=>'users.register',
        'uses'=>'UsersController@create'
    ]);

Route::post('/users/register',[
    'uses'=>'UsersController@store'
]);

Route::get('/users',
    [
        'as'=>'users.index',
        'uses'=>'UsersController@index',
        'middleware'=>'auth'
    ]);

Route::get('/users/profile',
    [
        'as'=>'users.show',
        'uses'=>'UsersController@show',
        'middleware'=>'auth'
    ]);

Route::get('/users/{id}/edit',
    [
        'as'=>'users.edit',
        'uses'=>'UsersController@edit',
        'middleware'=>'auth'
    ]);
Route::patch('/users/{id}',
    [
        'as'=>'users.update',
        'uses'=> 'UsersController@update',
        'middleware'=>'auth'
    ]);
Route::put('/users/{id}',[
    'uses'=>'UsersController@update',
    'middleware'=>'auth'
]);
Route::delete('/users/{id}',
    [
        'as'=>'users.delete',
        'uses'=>'UsersController@destroy',
        'middleware'=>'auth'
    ]);

Route::get('/advertisements',
    [
        'as'=>'advertisements.index',
        'uses'=>'AdvertisementsController@index',
        'middleware'=>'auth'
    ]);

Route::get('/advertisements/new',
    [
        'as'=>'advertisements.create',
        'uses'=>'AdvertisementsController@create',
        'middleware'=>'auth'
    ]);

Route::post('/advertisements/new',[
    'uses'=>'AdvertisementsController@store',
    'middleware'=>'auth']);

Route::get('/adverstisements/property/{ad_code}',[
    'as'    => 'advertisements.show',
    'uses'  =>'AdvertisementsController@show',
    'middleware'=>'auth'
]);
