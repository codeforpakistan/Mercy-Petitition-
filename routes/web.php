<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware('throttle:4|60,1')->get('/', function () {
    return view('auth.login');
});

Route::get('/reload-captcha', 'HomeController@reloadCaptcha')->name('reloadCaptcha');

Route::get('logout', 'Auth\loginController@logout')->name('logout');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Accepted', 'HomeController@accepted')->name('accepted');
Route::get('/Rejected', 'HomeController@rejected')->name('rejected');
Route::get('remarks/{id}', 'HomeController@view')->name('remarksview');
Route::get('inprocess', 'HomeController@inprocess')->name('inprocess');
Route::get('/homeremarks', 'HomeDepartmentController@remarksfrominterior')->name('remarksfrominterior');
Route::get('/homesearch', 'HomeDepartmentController@homesearch')->name('homesearch');
Route::get('/homeinteriorsearch', 'HomeDepartmentController@homeinteriorsearch')->name('homeinteriorsearch');

Route::get('/interiorsearch', 'InteriorMinstryController@interiorsearch')->name('interiorsearch');
Route::get('/humaninteriorsearch', 'InteriorMinstryController@humaninteriorsearch')->name('humaninteriorsearch');

Route::get('/hrsearch', 'HumanRightDepartmentController@hrsearch')->name('hrsearch');
Route::get('pdfview',array('as'=>'pdfview','uses'=>'HomeController@pdfview'));
Route::get('/search', 'PetitionController@search')->name('petitionsearch');
Route::get('/logpetition', 'PetitionController@logpetition')->name('logpetition');
Route::get('/Homeforward/{id}', 'HomeDepartmentController@forwardpetition')->name('home-forward');
Route::get('/homeremarksedit/{id}', 'HomeDepartmentController@homeremarksedit')->name('homeremarksedit');
Route::Post('/forwardinteriorministrydepartment/{id}', 'HomeDepartmentController@forwardinteriorministrydepartment')->name('forwardinteriorministrydepartment');
Route::get('/petitionforward/{id}', 'PetitionController@forwardpetition')->name('petition-forward');
Route::get('/remarksfromhome', 'PetitionController@remarksfromhome')->name('remarksfromhome');
Route::get('/interiorforward/{id}', 'InteriorMinstryController@forwardpetition')->name('interior-forward');
Route::get('/interiorministryfinaldecisions/{id}', 'InteriorMinstryController@interiorministryfinaldecisions')->name('interiorministryfinaldecisions');
Route::get('/decision/{id}', 'InteriorMinstryController@interiordecision')->name('decision');
Route::Post('/finaldecision/{id}', 'InteriorMinstryController@finaldecision')->name('final-decision');

Route::Post('/finalapprovedecision/{id}', 'InteriorMinstryController@finalapprovedecision')->name('finalapprovedecision');
Route::Post('/decision/{id}', 'InteriorMinstryController@decision')->name('petition-decision');
Route::get('interiorsearch', 'InteriorMinstryController@interiorsearch')->name('interiorsearch');
Route::get('finaldecision', 'InteriorMinstryController@finaldecisions')->name('finaldecisions');
Route::get('/humangrightback/{id}', 'HumanRightDepartmentController@backpetition')->name('humanright-back');
Route::Post('/humanrighdecision/{id}', 'HumanRightDepartmentController@humanrightdecision')->name('petition-humanrighdecision');
Route::get('/petitionedit/{id}', 'PetitionController@edit')->name('petition-edit');
Route::get('/reportform', 'HomeController@reportform')->name('reportform');
Route::get('/reportform/search', 'HomeController@searchreport')->name('reportform.search');
Route::get('/reportsearch', 'HomeController@searchreportform')->name('reportformtt.search');

Route::get('/homepetitionsearch', 'PetitionController@homepetitionsearch')->name('homepetitionsearch');
Route::get('/petitionsearch', 'PetitionController@searchform')->name('petitionsearchform');
Route::Post('/petitionupdate/{id}', 'PetitionController@petitionupdate')->name('petition-update');
Route::Post('/petitionrmarksupdate/{id}', 'PetitionController@petitionremarksupdate')->name('petitionremarksupdate');
Route::Post('/homeremarksupdate/{id}', 'HomeDepartmentController@homeremarksupdate')->name('homeremarksupdate');
Route::get('/petitionrmarksedit/{id}', 'PetitionController@petitionremarksedit')->name('petitionremarksedit');
Route::Post('/forwardhomedepartment/{id}', 'PetitionController@forwardhomedepartment')->name('forwardhomedepartment');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'dashboardController@dashboard')->name('portal.dashboard');
    Route::get('/petitionforward/{id}', 'PetitionController@forwardpetition')->name('petition-forward');

    Route::Post('/storepetition', 'PetitionController@storepetition')->name('storepetition');
    Route::get('/jailview/{id}', 'UserController@jailview')->name('jailview');
    Route::get('/view/{id}', 'PetitionController@view')->name('viewpetition');
    Route::get('/Interiorview/{id}', 'InteriorMinstryController@view')->name('InteriorMinstryviewpetition');
    Route::get('/remarksfromhrd', 'InteriorMinstryController@remarksfromhrd')->name('InteriorMinstry.hrd');
    Route::get('/humanrightview/{id}', 'HumanRightDepartmentController@view')->name('humanrightviewpetition');
    Route::resource('roles', 'RoleController');
    Route::resource('Petition', 'PetitionController');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('homedept', 'HomeDepartmentController');
    Route::resource('InteriorMinstry', 'InteriorMinstryController');
    Route::resource('HumanRight', 'HumanRightDepartmentController');
});
Route::get('physicalstatus', 'PhysicalStatusController@index')->name('physicalstatus.index');
Route::get('physicalstatus/add', 'PhysicalStatusController@create')->name('physicalstatus.add');
Route::post('physicalstatus/store', 'PhysicalStatusController@store')->name('physicalstatus.store');
Route::get('physicalstatus/edit/{id}', 'PhysicalStatusController@edit')->name('physicalstatus.edit');
Route::post('physicalstatus/update/{id}', 'PhysicalStatusController@update')->name('physicalstatus.update');
Route::get('physicalstatus/destroy/{id}', 'PhysicalStatusController@destroy')->name('physicalstatus.destroy');

Route::get('province', 'ProvinceController@index')->name('province.index');
Route::get('province/add', 'ProvinceController@create')->name('province.add');
Route::post('province/store', 'ProvinceController@store')->name('province.store');
Route::get('province/edit/{id}', 'ProvinceController@edit')->name('province.edit');
Route::post('province/update/{id}', 'ProvinceController@update')->name('province.update');
Route::get('province/destroy/{id}', 'ProvinceController@destroy')->name('province.destroy');

Route::get('jail', 'JailController@index')->name('jail.index');
Route::get('jail/add', 'JailController@create')->name('jail.add');
Route::post('jail/store', 'JailController@store')->name('jail.store');
Route::get('jail/edit/{id}', 'JailController@edit')->name('jail.edit');
Route::post('jail/update/{id}', 'JailController@update')->name('jail.update');
Route::get('jail/destroy/{id}', 'JailController@destroy')->name('jail.destroy');
