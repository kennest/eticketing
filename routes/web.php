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
Auth::routes();

Route::get('/', 'ClientController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::get('/register', 'Auth\AdminLoginController@showRegisterForm')->name('admin.register');

    Route::post('/doLogin', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/doRegister', 'Auth\AdminLoginController@register')->name('admin.register.submit');

    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');

    //Events Form actions
    Route::get('form/event/{uuid?}', 'AdminController@formEvent')->name('admin.form.event');
    Route::post('event/save', 'AdminController@save')->name('admin.save.event');
    Route::post('update', 'AdminController@update')->name('admin.update.event');

    //Events List
    Route::get('list/event/', 'AdminController@listEvent')->name('admin.list.event');
    Route::get('event/delete/{uuid}', 'AdminController@delete');

    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/goPrime', 'AdminController@goPrime')->name('admin.goprime');
    Route::get('/sousCat', 'AdminController@getSousCategorie')->name('admin.souscat');
});

Route::prefix('superadmin')->group(function () {
    Route::get('/', 'SuperAdminController@index')->name('supadmin.index');
    Route::get('/organisateurs', 'SuperAdminController@organisateur')->name('supadmin.org');
    Route::get('/parametres', 'SuperAdminController@parametres')->name('supadmin.params');
    Route::get('/toggle', 'SuperAdminController@toggleMode')->name('supadmin.toggle');
});
