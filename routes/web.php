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



Route::get('/envios/creacion', 'HomeController@creacion')->name('creacion');

/* Ambiente de DEV */
Route::middleware(['throttle:30,1', 'auth' ])->group(function () {
    Route::name('dev.')->prefix('dev')->group(function () {
            
            Route::get('/inicio', 'HomeController@inicio')->name('inicio');
            
        	Route::resource('envios', 'Web\Dev\EnviosController');
            Route::get('envios/guias/creada', 'Web\Dev\EnviosController@guia_creada')->name('envios.creacion');
            Route::post('envios/guias/salvacion', 'Web\Dev\EnviosController@storeAs')->name('envios.salvacion');
        
    });
});

/* Ambiente de PRD */




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
