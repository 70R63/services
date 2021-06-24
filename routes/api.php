<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/*

Route::middleware('auth:api')->get('/', function (Request $request) { 
     return $request->user(); 
});
*/



Route::get('/', 'HomeController@index')->name('homeApi');

Route::name('dev.logistic.')->prefix('logistic')->group(function () {
    Route::post('estafeta_dev', 'Logistic\Dev\EstafetaController@index')->name('index');
    
});

/* Ambiente de DEV */
Route::middleware(['throttle:10,1'])->group(function () {
    Route::name('dev.')->prefix('dev')->group(function () {
        Route::name('logistic.')->prefix('logistic')->group(function () {
            Route::post('seguimiento', 'Logistic\Dev\EstafetaController@seguimiento')->name('seguimiento');
        });
    });
});

/* Ambiente de PRD */
Route::name('logistic.')->prefix('logistic')->group(function () {
    Route::post('estafeta', 'Logistic\Prd\EstafetaController@index')->name('index');

});

