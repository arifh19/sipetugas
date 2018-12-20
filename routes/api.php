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
    Route::resource('supir', 'SupirController',[
         'except' => ['create','edit']
    ]);
    Route::resource('kecepatan', 'KecepatanController',[
        'only' => ['store','index']
    ]);
    Route::get('kecepatan/{speed?}', function ($speed) {
        return view('kecepatan')->with(compact('speed'));
    });
});
