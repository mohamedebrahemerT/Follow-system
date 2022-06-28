<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['namespace'=>'Admin'],function(){

    Route::group(['middleware' => 'guest'], function () {

Route::get('/','AdminController@viwlogin');
Route::get('/admin_login','AdminController@viwlogin');
Route::get('/admin','AdminController@viwlogin');
Route::post('/admin_login','AdminController@admin_login');
     });

// Forget Routes
        Route::post('admin/password/forget', 'Auth\ForgotPasswordController@forget');
        // Reset Routes
        Route::get('admin/password/reset/{token}', 'Auth\ResetPasswordController@renderReset');
        Route::post('admin/password/reset', 'Auth\ResetPasswordController@reset');

    Route::view('need/permission', 'admin.no_permission');
     
Route::group(['middleware' => 'admin:admin'], function () {
Route::get('/dashboard','AdminController@dashboard');
Route::get('Admin_logout', 'AdminController@Admin_logout_fun');

Route::resource('admins', 'AdminController');
Route::get('admins/{id}/destroy', 'AdminController@destroy');

Route::resource('clients', 'clientsController');
Route::get('clients/{id}/destroy', 'clientsController@destroy');

Route::get('clientplans/{client_id}', 'clientplansController@index');
Route::get('/clientplans/create/{client_id}', 'clientplansController@create');

    Route::resource('clientplans', 'clientplansController');
Route::get('clientplans/{id}/destroy', 'clientplansController@destroy');
Route::get('clientplans/show/{id}', 'clientplansController@show');
 

Route::resource('AccountManager', 'AccountManagerController');
Route::get('AccountManager/{id}/destroy', 'AccountManagerController@destroy');

Route::resource('GraphicDesign', 'GraphicDesignController');
Route::get('GraphicDesign/{id}/destroy', 'GraphicDesignController@destroy');

Route::resource('SocialMediaPlatforms', 'SocialMediaPlatformsController');
Route::get('SocialMediaPlatforms/{id}/destroy', 'SocialMediaPlatformsController@destroy');

Route::resource('ContentTypes', 'ContentTypesController');
Route::get('ContentTypes/{id}/destroy', 'ContentTypesController@destroy');

Route::resource('clientsnots', 'clientsnotsController');
Route::get('clientsnots/{id}/destroy', 'clientsnotsController@destroy');

Route::resource('content', 'contentController');
Route::get('content/{id}/destroy', 'contentController@destroy');
Route::get('content/index/{clientplan_id}', 'contentController@index');
Route::get('content/create/{clientplan_id}', 'contentController@create');
Route::get('getcontent', 'contentController@getcontent');
Route::post('comment', 'contentController@comment');


 

Route::resource('roles', 'rolesController');
Route::get('roles/{id}/destroy', 'rolesController@destroy');
Route::get('roles/addpermissions/{Role_id}', 'rolesController@addpermissions');
Route::post('roles/addpermissions', 'rolesController@addpermissionsPOST');
 
Route::resource('AdminGroup', 'AdminGroupController');

Route::get('Settings/edit', 'SettingsController@edit');
Route::post('Settings/update', 'SettingsController@update');

  });

});


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    return 'Application cache cleared';
});

Route::get('/storage', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    return 'Storage Linked';
});
