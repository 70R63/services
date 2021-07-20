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

Route::get('/inicio', 'HomeController@index')->name('index');

Route::get('/envios/creacion', 'HomeController@creacion')->name('creacion');

/* Ambiente de DEV */
Route::middleware(['throttle:30,1'])->group(function () {
    Route::name('dev.')->prefix('dev')->group(function () {
        
            
        	Route::resource('envios', 'Web\Dev\EnviosController');
            Route::get('envios/guias/creada', 'Web\Dev\EnviosController@guia_creada')->name('envios.creacion');
            #Route::post('seguimiento', 'Web\Dev\EstafetaController@seguimiento')->name('seguimiento');
        
    });
});

/* Ambiente de PRD */

