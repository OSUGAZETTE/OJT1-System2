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

<<<<<<< HEAD
Route::get('/', 'WelcomeController@welcome')->name('home');
Route::get('/gazette', 'WelcomeController@gazette')->name('gazette');
Route::get('/gazette/search', 'WelcomeController@Search')->name('/gazette/search');
=======
Route::get('/', 'WelcomeController@welcome')->name('Welcome');
Route::get('/Welcome/Date', 'WelcomeController@dateSearch')->name('Welcome/Date');
>>>>>>> fca653f7858ccb9756f6e8e1be82494d8e80abd4
/*Route::get('/admin', 'AdminController@welcome')->name('WelcomeAdmin');*/

Auth::routes();

<<<<<<< HEAD
Route::get('/Dashboard', 'HomeController@index')->name('Dashboard');
Route::get('/Dashboard/search', 'HomeController@dateSearch')->name('/Dashboard/search');
=======
Route::get('/Home', 'HomeController@index')->name('Home');
Route::get('/Date', 'HomeController@dateSearch');
>>>>>>> fca653f7858ccb9756f6e8e1be82494d8e80abd4
Route::get('/Upload', 'UploadController@index')->name('Upload');
Route::post('/Upload', 'UploadController@uploadpdf')->name('Uploadpdf');

Route::get('/Edit&Delete', 'EditDeleteController@index')->name('Edit&Delete');
Route::post('/Edit&Delete', 'EditDeleteController@editpdf')->name('Editpdf');
Route::get('/EditProfile', 'EditProfileController@index')->name('EditProfile');
Route::post('/EditProfile', 'EditProfileController@editprofile')->name('EditProf');
Route::get('GetData', 'EditDeleteController@getdata');
Route::get('/Delete/{MeetingID}', 'EditDeleteController@deleteHistory');

Route::get('/History', 'HistoryController@index')->name('History');

Route::post('/StoreCheck', 'AdminController@storeCheck');