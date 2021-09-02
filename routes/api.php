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

Route::get('/', 'HomeController@index')->name('homeApi');


Route::group(array('domain' => env('APP_URL')), function() {
    Route::middleware(['throttle:100,1'])->group(function () {
       
        Route::name('logistic.')->prefix('logistic')->group(function () {
            Route::post('estafeta', 'Logistic\EstafetaController@index')->name('index');
            Route::post('seguimiento', 'Logistic\EstafetaController@seguimiento')
                    ->name('seguimiento');
        });
        Route::name('api.')->group(function () {
            //RECURSO PARA ENVIOS
            Route::name('envios.')->prefix('envios')->group(function () {
                Route::get('precio', 'Web\Dev\EnviosController@precio')
                        ->name('precio');
                    
            });
            //Fin de envios.
        });
        //fin de api.    
    });
    //Fin Middileware
}); 
//Fin Domain


