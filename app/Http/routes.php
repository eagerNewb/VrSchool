<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin', 'Admin\\AdminController@index');
Route::get('admin/give-role-permissions', 'Admin\\AdminController@getGiveRolePermissions');
Route::post('admin/give-role-permissions', 'Admin\\AdminController@postGiveRolePermissions');
Route::resource('admin/roles', 'Admin\\RolesController');
Route::resource('admin/permissions', 'Admin\\PermissionsController');
Route::resource('admin/users', 'Admin\\UsersController');

Route::get('profile', [
    'middleware' => 'auth',
    'uses' => 'ProfileController@show'
]);
Route::get('profile', [
    'middleware' => 'auth',
    'uses' => 'ProfileController@index']);


Route::auth();

Route::get('/home', 'HomeController@index');
