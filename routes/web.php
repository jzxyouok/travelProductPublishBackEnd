<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('login', 'AuthController@getLogin')->name('admin.login');
    Route::post('login', 'AuthController@postLogin')->name('admin.login');

    Route::get('index', 'IndexController@index')->name('admin.index');
});

//生成用户、角色、权限
Route::get('/entrustSeeder', 'Test\EntrustController@test');




