<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.index');
});

Auth::routes();
//Route::redirect('/', '/index');
//Route::redirect('/home', '/Dashboard/home');
Route::get('/home/{path}', 'HomeController@index')->where('path','([A-z]+)?');
//Route::get('/index/{path}', 'HomeController@front')->where('path','([A-z]+)?');

//Route::get('/index/{any}', 'HomeController@front')->where('any', '.*');
Route::get('/home', 'HomeController@index')->name('home');


