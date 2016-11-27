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

/*前端路由*/
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index');

/*后端路由*/
Route::get('admin', function () {
    return redirect(route('admin.login'));
});

Route::group(['middleware' => ['web'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::resource('posts', 'PostController');
});

Route::group(['middleware' => ['web'],'prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('login', 'AuthController@getLogin')->name('admin.login');
    Route::post('login', 'AuthController@postLogin')->name('admin.login');
    Route::get('index', 'IndexController@index')->name('admin.index');

    //logout
    Route::get('logout', 'AuthController@logout')->name('admin.logout');

    //系统管理 二级菜单
    Route::get('user/manager', 'IndexController@userManager')->name('admin.user.manager');


    //用户管理
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');


});

//生成用户、角色、权限
Route::get('/entrustSeeder', 'Test\EntrustController@test');




