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
*/Auth::routes();
Route::prefix('/portal')->name('portal.')->group(function () {
    Route::group(['middleware' => ['auth']], function() {
        Route::get('/', 'DashboardController@index');
        Route::resource('roles','RoleController');
        Route::resource('users','UserController');
        
        Route::match(['get', 'post'], 'users/change/password','UserController@password')->name('users.password');
        Route::match(['get', 'post'], 'users/view/profile','UserController@profile')->name('users.profile');
    });
});



