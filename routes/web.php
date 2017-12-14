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

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function() {
    Route::get('/login',
        'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');

    //Events Form actions
    Route::get('form/event/{uuid?}', 'AdminController@formEvent')->name('admin.form.event');
    Route::get('list/event/', 'AdminController@listEvent')->name('admin.list.event');
    Route::post('event/save', 'AdminController@save')->name('admin.save.event');
    Route::post('update', 'AdminController@update')->name('admin.update.event');

    //Events List



    Route::get('/', 'AdminController@index')->name('admin.index');
});
