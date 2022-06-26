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
