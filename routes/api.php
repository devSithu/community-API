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

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('user/profile', 'CommunityController@checkToken');
    Route::post('user/app_changeFBLoginID', 'CommunityController@app_changeLoginID');
});

Route::group(['middleware' => 'auth:users'], function () {
    Route::get('authUser/check', 'CommunityController@authCheckUser'); //ref
    Route::get('authUser/revoke', 'CommunityController@revokeUserAuth');
});

Route::post('user/app_userLogin', 'CommunityController@app_userLogin');
Route::post('user/app_createUser', 'CommunityController@app_createUser');
Route::post('user/app_checkDuplicateUser', 'CommunityController@app_checkDuplicateUser');
Route::post('user/app_updateUser', 'CommunityController@app_updateUser');

//admin login
Route::post('admin/app_register','User\RegisterController@app_register');

// Route::get('user/getTopicContent', 'CommunityController@getTopicContent');

