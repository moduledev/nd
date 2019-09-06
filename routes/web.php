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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/login', 'Auth\Admin\AdminLoginController@login');
Route::post('admin/login', 'Auth\Admin\AdminLoginController@loginAdmin')->name('admin.login');
Route::post('admin/logout', 'Auth\Admin\AdminLoginController@logout')->name('admin.logout');

Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard.index');

Route::post('/dashboard/admin', 'AdminController@store')->name('admin.add');
Route::get('dashboard/admins', 'AdminController@index')->name('admin.index');
Route::get('/dashboard/admin/create', 'AdminController@create')->name('admin.create');
Route::get('/dashboard/admin/{id}', 'AdminController@show')->name('admin.show');
Route::delete('/dashboard/admin/{id}', 'AdminController@destroy')->name('admin.delete');
Route::get('/dashboard/admin/edit/{id}', 'AdminController@edit')->name('admin.edit');
Route::put('/dashboard/admin/edit/{id}', 'AdminController@update')->name('admin.update');




