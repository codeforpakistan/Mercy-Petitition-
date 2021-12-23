<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('web')->group(base_path('routes/portal.php'));


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/reload-captcha','HomeController@reloadCaptcha')->name('reloadCaptcha');

Route::get('/dashboard', function () {
    return view('welcome');
})->name('portal.dashboard');
Route::get('logout','Auth\loginController@logout')->name('logout');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search','PetitionController@search')->name('petitionsearch');
Route::get('/petitionforward/{id}','PetitionController@forwardpetition')->name('petition-forward');
Route::get('/petitionedit/{id}','PetitionController@edit')->name('petition-edit');
Route::Post('/petitionupdate/{id}','PetitionController@petitionupdate')->name('petition-update');
Route::Post('/forwardhomedepartment/{id}','PetitionController@forwardhomedepartment')->name('forwardhomedepartment');
Route::group(['middleware' => ['auth']], function() {
    Route::get('/petitionforward/{id}','PetitionController@forwardpetition')->name('petition-forward');
    Route::Post('/storepetition','PetitionController@storepetition')->name('storepetition');
    Route::get('/view/{id}','PetitionController@view')->name('viewpetition');
    Route::resource('roles','RoleController');
    Route::resource('Petition','PetitionController');
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('permissions','PermissionController');
    Route::resource('homedept','HomeDepartmentController');
    Route::resource('InteriorMinstry','InteriorMinstryController');
});

