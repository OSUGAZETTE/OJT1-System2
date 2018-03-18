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

Route::get('/', 'WelcomeController@welcome')->name('Welcome');
/*Route::get('/admin', 'AdminController@welcome')->name('WelcomeAdmin');*/

Auth::routes();

Route::get('/Home', 'HomeController@index')->name('Home');
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