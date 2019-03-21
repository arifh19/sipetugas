<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' =>'v1', 'middleware' => 'api'], function(){
    Route::resource('penumpang', 'PenumpangController',[
        'only' => ['store','index']
    ]);
    Route::get('/supir', 'SupirController@indexApi')->name('supir.indexApi');

    Route::get('/bus', 'BusController@indexApi')->name('bus.indexApi');
    Route::get('/kecepatan', 'KecepatanController@indexApi')->name('kecepatan.indexApi');
    Route::post('/simpan', 'KecepatanController@simpan')->name('kecepatan.simpan');
    Route::post('/kecepatan', 'KecepatanController@store')->name('kecepatan.storeApi');
    Route::get('kecepatan/{speed?}', function ($speed) {
        return view('kecepatan')->with(compact('speed'));
    });
});
