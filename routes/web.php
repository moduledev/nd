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

    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard.index');
    Route::get('admins', 'Admin\DashboardController@admins')->name('admin.index');
    Route::get('roles', 'Admin\DashboardController@roles')->name('role.index');

    Route::get('roles/create', 'Admin\RoleController@create')->name('role.create');
    Route::get('role', 'Admin\RoleController@create')->name('role.create');
    Route::get('role/edit/{id}', 'Admin\RoleController@edit')->name('role.edit');
    Route::get('role/{id}', 'Admin\RoleController@show')->name('role.show');
    Route::put('role/edit/{id}', 'Admin\RoleController@update')->name('role.update');
    Route::post('role', 'Admin\RoleController@store')->name('role.add');
    Route::delete('role/{id}', 'Admin\RoleController@destroy')->name('role.delete');

    Route::post('admin', 'Admin\AdminController@store')->name('admin.add');
    Route::get('admin/create', 'Admin\AdminController@create')->name('admin.create');
    Route::get('admin/{id}', 'Admin\AdminController@show')->name('admin.show');
    Route::delete('admin/{id}', 'Admin\AdminController@destroy')->name('admin.delete');
    Route::get('admin/edit/{id}', 'Admin\AdminController@edit')->name('admin.edit');
    Route::put('admin/edit/{id}', 'Admin\AdminController@update')->name('admin.update');
});



Route::get('test', function (){
    $product = new \App\Product();
    $product->available = 1;
    $product->slug = 'test';
    $product->save();

    foreach (['ua', 'ru'] as $locale) {
        $product->translateOrNew($locale)->name = "Title {$locale}";
        $product->translateOrNew($locale)->description = "Text {$locale}";
        $product->translateOrNew($locale)->slug = "Text {$locale}";
    }

    $product->save();

    echo 'Created an article with some translations!';
});

Route::get('{locale}', function($locale) {
    app()->setLocale($locale);

    $product = \App\Product::findOrFail(1);

    return view('test', compact('product'));
});
