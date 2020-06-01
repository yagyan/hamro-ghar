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
Route::apiResources(['state'=>'API\statecontroller']);
Route::apiResources(['district'=>'API\districtcontroller']);
Route::apiResources(['municipality'=>'API\municicontroller']);
Route::apiResources(['ward'=>'API\wardcontroller']);
Route::apiResources(['address'=>'API\addresscontroller']);
Route::apiResources(['propertytype'=>'API\propertytypecontroller']);
Route::apiResources(['usertype'=>'API\usertypecontroller']);
Route::apiResources(['user'=>'API\usermanagementcontroller']);
Route::apiResources(['userinfo'=>'API\UserController']);
Route::apiResources(['post'=>'API\postcontroller']);
Route::get('/getdistrict/{id}','API\districtcontroller@getdistrict');
Route::get('/getmunicipality/{data}','API\municicontroller@getmunicipality');
Route::get('/getward/{data}','API\wardcontroller@getward');
Route::get('/adduser/{id}/','API\UserController@adduser');
Route::get('/yourpost/{id}/','API\postcontroller@yourpost');
Route::get('/singlepost/{id}/','API\postcontroller@singlepost');
Route::get('/search/{type}/{bed}/{bath}/{price}','API\postcontroller@searchpost');

Route::put('/updateprofile/{id}/','API\addresscontroller@updateprofile');

