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

Route::get('/', 'sessionController@index');

Route::get('/login', 'sessionController@create')->name('login');
Route::post('/login', 'sessionController@store');
Route::get('/logout', 'sessionController@destroy');

Route::get('/dashboard', 'dashboardController@index')->middleware('guest');

//admin
Route::post('/tambah-masuk', 'dashboardController@tambahMasuk')->middleware('guest');
Route::post('/tambah-keluar', 'dashboardController@tambahKeluar')->middleware('guest');

Route::get('/surat-masuk', 'adminController@suratMasuk')->middleware('guest');
Route::post('/edit-masuk/{surat}', 'adminController@editMasuk')->middleware('guest');
Route::delete('/hapus-masuk/{surat}', 'adminController@hapusMasuk')->middleware('guest');
Route::get('/surat-masuk/masuk_pdf', 'adminController@masuk_pdf');

Route::get('/surat-keluar', 'adminController@suratKeluar')->middleware('guest');
Route::post('/edit-keluar/{surat}', 'adminController@editKeluar')->middleware('guest');
Route::delete('/hapus-keluar/{surat}', 'adminController@hapusKeluar')->middleware('guest');
Route::get('/surat-keluar/keluar_pdf', 'adminController@keluar_pdf');

Route::get('/disposisi', 'adminController@disposisi')->middleware('guest');
Route::post('/tambah-disposisi', 'adminController@tambahDisposisi')->middleware('guest');

//kepala
Route::get('/surat-baru/{id}', 'kepalaController@suratBaru')->middleware('guest');
Route::get('/disposisi-baru/{id}', 'kepalaController@disposisiBaru')->middleware('guest');
Route::post('/disposisi-baru/update/{disposisi}', 'kepalaController@updateDisposisi')->middleware('guest');

Route::get('/data-surat/{id}', 'kepalaController@dataSurat')->middleware('guest');
Route::get('/data-disposisi/{id}', 'kepalaController@dataDisposisi')->middleware('guest');
Route::post('/surat-baru/update/{surat}', 'kepalaController@updateSurat')->middleware('guest');

