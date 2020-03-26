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

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'ShopController@index');

Route::prefix('admin')->group(function () {

    Route::get('login', 'Auth\Admin\AdminLoginController@login');
    Route::post('login', 'Auth\Admin\AdminLoginController@loginAdmin')->name('admin.login');
    Route::post('logout', 'Auth\Admin\AdminLoginController@logout')->name('admin.logout');

    Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');
    Route::get('admins', 'DashboardController@admins')->name('admin.index');
    Route::get('roles', 'DashboardController@roles')->name('role.index');

    Route::get('dashboard/roles/create', 'RoleController@create')->name('role.create');
    Route::get('dashboard/role', 'RoleController@create')->name('role.create');
    Route::post('dashboard/role', 'RoleController@store')->name('role.add');


    Route::post('admin', 'AdminController@store')->name('admin.add');
    Route::get('admin/create', 'AdminController@create')->name('admin.create');
    Route::get('admin/{id}', 'AdminController@show')->name('admin.show');
    Route::delete('admin/{id}', 'AdminController@destroy')->name('admin.delete');
    Route::get('admin/edit/{id}', 'AdminController@edit')->name('admin.edit');
    Route::put('admin/edit/{id}', 'AdminController@update')->name('admin.update');
});





