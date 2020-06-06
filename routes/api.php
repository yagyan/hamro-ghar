<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});
//address routes
Route::apiResources(['state'=>'API\statecontroller']);
Route::apiResources(['district'=>'API\districtcontroller']);
Route::apiResources(['municipality'=>'API\municicontroller']);
Route::apiResources(['ward'=>'API\wardcontroller']);
Route::apiResources(['address'=>'API\addresscontroller']);
Route::get('/getdistrict/{id}','API\districtcontroller@getdistrict');
Route::get('/getmunicipality/{data}','API\municicontroller@getmunicipality');
Route::get('/getward/{data}','API\wardcontroller@getward');
Route::get('/adduser/{id}/','API\UserController@adduser');

//user realted routes
Route::apiResources(['usertype'=>'API\usertypecontroller']);
Route::apiResources(['user'=>'API\usermanagementcontroller']);
Route::post('/register','API\register@store');
Route::apiResources(['userinfo'=>'API\UserController']);
Route::put('/updateprofile/{id}/','API\UserController@updateprofile');

//post and property related post
Route::apiResources(['propertytype'=>'API\propertytypecontroller']);
Route::apiResources(['post'=>'API\postcontroller']);
Route::get('/yourpost/{id}/','API\postcontroller@yourpost');
Route::get('/singlepost/{id}','API\postcontroller@singlepost');
Route::get('/search/{type}/{bed}/{bath}/{price}','API\postcontroller@searchpost');


