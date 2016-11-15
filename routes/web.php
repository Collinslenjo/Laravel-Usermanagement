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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('manager','ManagerController');


Route::get('admin', ['as' =>'manager', 'uses' => 'HomeController@admin', 'middleware' => ['auth', 'admin']]);

Route::get('protected', ['as' =>'/home', 'uses' => 'HomeController@index', 'middleware' => 'auth']);