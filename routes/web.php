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
Route::prefix('')->group(function () {
    Route::get('/', 'ClientController@index')->name('index');
    Route::post('/store', 'ClientController@storeData')->name('store');
    Route::get('/show_details/event/uuid={uuid}', 'ClientController@details')->name('details');
    Route::get('/payment/event/uuid={uuid}', 'ClientController@paymentWizard')->name('payment');

    Route::get('wizard/payment/{step?}', 'PaymentController@wizard')->name('wizard.step');
    Route::post('wizard/payment/{step}', 'PaymentController@wizardPost')->name('wizard.step.post');
    Route::get('payment/buy','PaymentController@buy')->name('wizard.buy');
    Route::get('payment/reservation','PaymentController@reservation')->name('wizard.reservation');
    /*Route::get('login/facebook', 'SocialLoginController@redirectToProvider')->name('login.facebook');
    Route::get('login/facebook/callback', 'SocialLoginController@handleProviderCallback')->name('facebook.callback');*/
    VisitStats::routes();
});
Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::get('/register', 'Auth\AdminLoginController@showRegisterForm')->name('admin.register');

    Route::post('/doLogin', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/doRegister', 'Auth\AdminLoginController@register')->name('admin.register.submit');

    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');

    //Events Form actions
    Route::get('form/event/{uuid?}', 'AdminController@formEvent')->name('admin.form.event');
    Route::post('event/save', 'AdminController@save')->name('admin.save.event');
    Route::post('event/update', 'AdminController@update')->name('admin.update.event');

    Route::get('/participants/{id?}', 'AdminController@participants')->name('admin.participants');
    Route::post('participant/save', 'AdminController@addparticipant')->name('admin.add.participant');
    Route::post('participan/update', 'AdminController@updateparticipant')->name('admin.update.participant');

    //Events List
    Route::get('list/event/', 'AdminController@listEvent')->name('admin.list.event');
    Route::get('event/delete/{uuid}', 'AdminController@delete');

    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/goPrime', 'AdminController@goPrime')->name('admin.goprime');
});

Route::prefix('superadmin')->group(function () {
    Route::get('/', 'SuperAdminController@index')->name('supadmin.index');

    Route::get('/login', 'SuperAdminController@login')->name('supadmin.login');
    Route::get('/logout', 'SuperAdminController@logout')->name('supadmin.logout');
    Route::post('/doLogin', 'SuperAdminController@doLogin')->name('supadmin.dologin');

    Route::get('/organisateurs', 'SuperAdminController@organisateur')->name('supadmin.org');
    Route::get('/evenements', 'SuperAdminController@evenements')->name('supadmin.events');
    
    Route::get('/lieu/{id?}', 'SuperAdminController@lieu')->name('supadmin.lieu');
    Route::get('/categorie/{id?}', 'SuperAdminController@categorie')->name('supadmin.categorie');
    Route::get('/type/{id?}', 'SuperAdminController@type')->name('supadmin.type');

    Route::get('/banner/{id?}', 'SuperAdminController@banner')->name('supadmin.banner');
    Route::post('/banner/add', 'SuperAdminController@addbanner')->name('supadmin.addbanner');
    Route::post('/banner/update', 'SuperAdminController@updatebanner')->name('supadmin.updatebanner');
    
    Route::get('/top/', 'SuperAdminController@top')->name('supadmin.top');
    
    Route::get('/toggleMode', 'SuperAdminController@toggleMode')->name('supadmin.toggle');
    Route::get('/togglestate/{id}', 'SuperAdminController@toggleState')->name('supadmin.togglestate');
    Route::get('/delOrg/{id}', 'SuperAdminController@delOrganisateur')->name('supadmin.delorg');

    Route::post('/add/lieu', 'SuperAdminController@addLieu')->name('supadmin.addlieu');
    Route::post('/update/lieu', 'SuperAdminController@updateLieu')->name('supadmin.updatelieu');

    Route::post('/add/categorie', 'SuperAdminController@addCategorie')->name('supadmin.addcat');
    Route::post('/update/categorie', 'SuperAdminController@updateCategorie')->name('supadmin.updatecat');

    Route::post('/add/type', 'SuperAdminController@addType')->name('supadmin.addtype');
    Route::post('/update/type', 'SuperAdminController@updateType')->name('supadmin.updatetype');
});
