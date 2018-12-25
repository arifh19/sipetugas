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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::resource('bus', 'BusController', [
]);
Route::resource('supir', 'SupirController', [
]);
Route::get('/petugas', 'SupirController@indexPetugas')->name('petugas.indexPetugas');
Route::get('/penumpang', 'PenumpangController@indexPenumpang')->name('penumpang.indexPenumpang');
Route::get('/kecepatan', 'KecepatanController@index')->name('kecepatan.index');
