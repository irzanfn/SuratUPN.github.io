<?php

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

Route::resource('/Edit', 'ProfileController');
Route::get('/EditPassword', 'ProfileController@index_password');
Route::post('change-password', 'ProfileController@update_password')->name('change.password');

Route::get('/Gallery/sMasuk', 'GalleryController@gallerymasuk');
Route::get('/Gallery/sKeluar', 'GalleryController@gallerykeluar');
Route::resource('Surat/sMasuk', 'SMasukController');
Route::resource('Surat/sKeluar', 'SKeluarController');
Route::get('Surat/sKeluarinternal','SKeluarController@indexInternal');
Route::get('Surat/sKeluarexternal','SKeluarController@indexExternal');

Route::resource('User', 'UserController');
Route::get('Tambahuser', 'UserController@adduser')->name('adduser');
Route::patch('/User/{user}/Reset', 'UserController@reset_password');
Route::get('Agenda/sMasuk', 'AgendaController@index_smasuk');
Route::post('Agenda/sMasuk', 'AgendaController@suratmasuk');
Route::get('Agenda/sKeluar', 'AgendaController@index_skeluar');
Route::post('Agenda/sKeluar', 'AgendaController@suratkeluar');


Route::get('Surat/sMasuk/{sMasuk}/Disposisi','SMasukController@foreign')->name('foreign');
Route::post('Surat/sMasuk/{sMasuk}/Disposisi','SMasukController@foreign_store');
Route::get('Surat/sMasuk/{sMasuk}/Disposisi/{disposisi}','SMasukController@foreign_show')->name('foreign_show');
Route::get('Surat/sMasuk/{sMasuk}/Disposisi/{disposisi}/print','SMasukController@foreign_print')->name('foreign_print');
Route::delete('Surat/sMasuk/{sMasuk}/Disposisi/{disposisi}','SMasukController@foreign_destroy')->name('foreign_destroy');
Route::patch('Surat/sMasuk/{sMasuk}/Disposisi/{disposisi}','SMasukController@foreign_update')->name('foreign_update');
Route::get('Surat/sMasukinternal','SMasukController@indexInternal');
Route::get('Surat/sMasukexternal','SMasukController@indexExternal');

Route::resource('Disposisi', 'DisposisiController');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@test')->name('test');

Auth::routes(['register' => false,'verify' => false,'reset' => false]);
