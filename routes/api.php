<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\UserController@store');

Route::group(['middleware' => 'auth:api'], function() {

    Route::post('user/update_location', 'Api\UserController@updateLocation');
    Route::post('user/update_address', 'Api\AddressController@updateAddress');
    Route::get('user/profile', 'Api\UserController@getUserInformation');
});
