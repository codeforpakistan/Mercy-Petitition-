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

Route::get('logout','Auth\loginController@logout')->name('logout');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Accepted', 'HomeController@accepted')->name('accepted');
Route::get('/Rejected', 'HomeController@rejected')->name('rejected');
Route::get('remarks/{id}', 'HomeController@view')->name('remarksview');
Route::get('/homeremarks','HomeDepartmentController@remarksfrominterior')->name('remarksfrominterior');
Route::get('/homesearch','HomeDepartmentController@homesearch')->name('homesearch');
Route::get('/search','PetitionController@search')->name('petitionsearch');
Route::get('/Homeforward/{id}','HomeDepartmentController@forwardpetition')->name('home-forward');
Route::get('/homeremarksedit/{id}','HomeDepartmentController@homeremarksedit')->name('homeremarksedit');
Route::Post('/forwardinteriorministrydepartment/{id}','HomeDepartmentController@forwardinteriorministrydepartment')->name('forwardinteriorministrydepartment');
Route::get('/petitionforward/{id}','PetitionController@forwardpetition')->name('petition-forward');
Route::get('/remarksfromhome','PetitionController@remarksfromhome')->name('remarksfromhome');
Route::get('/interiorforward/{id}','InteriorMinstryController@forwardpetition')->name('interior-forward');
Route::Post('/decision/{id}','InteriorMinstryController@decision')->name('petition-decision');
Route::get('/humangrightback/{id}','HumanRightDepartmentController@backpetition')->name('humanright-back');
Route::Post('/humanrighdecision/{id}','HumanRightDepartmentController@humanrightdecision')->name('petition-humanrighdecision');
Route::get('/petitionedit/{id}','PetitionController@edit')->name('petition-edit');
Route::get('/reportform','PetitionController@reportform')->name('reportform');
Route::get('/petitionsearch','PetitionController@searchform')->name('petitionsearchform');
Route::Post('/petitionupdate/{id}','PetitionController@petitionupdate')->name('petition-update');
Route::Post('/petitionrmarksupdate/{id}','PetitionController@petitionremarksupdate')->name('petitionremarksupdate');
Route::Post('/homeremarksupdate/{id}','HomeDepartmentController@homeremarksupdate')->name('homeremarksupdate');
Route::get('/petitionrmarksedit/{id}','PetitionController@petitionremarksedit')->name('petitionremarksedit');
Route::Post('/forwardhomedepartment/{id}','PetitionController@forwardhomedepartment')->name('forwardhomedepartment');
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'dashboardController@dashboard')->name('portal.dashboard');
    Route::get('/petitionforward/{id}','PetitionController@forwardpetition')->name('petition-forward');
    Route::Post('/storepetition','PetitionController@storepetition')->name('storepetition');
    Route::get('/view/{id}','PetitionController@view')->name('viewpetition');
    Route::get('/Interiorview/{id}','InteriorMinstryController@view')->name('InteriorMinstryviewpetition');
    Route::get('/remarksfromhrd','InteriorMinstryController@remarksfromhrd')->name('InteriorMinstry.hrd');
    Route::get('/humanrightview/{id}','HumanRightDepartmentController@view')->name('humanrightviewpetition');
    Route::resource('roles','RoleController');
    Route::resource('Petition','PetitionController');
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('permissions','PermissionController');
    Route::resource('homedept','HomeDepartmentController');
    Route::resource('InteriorMinstry','InteriorMinstryController');
    Route::resource('HumanRight','HumanRightDepartmentController');
});

