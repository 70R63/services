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

/*
Route::name('dev.logistic.')->prefix('logistic')->group(function () {
    
    
});

*/

Route::group(array('domain' => env('APP_URL')), function() {
    Route::middleware(['throttle:100,1'])->group(function () {
       
            Route::name('logistic.')->prefix('logistic')->group(function () {
                Route::post('estafeta', 'Logistic\EstafetaController@index')->name('index');
                Route::post('seguimiento', 'Logistic\EstafetaController@seguimiento')->name('seguimiento');
            });
       
    });
}); 


