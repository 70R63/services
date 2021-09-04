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

Route::group(array('domain' => env('APP_URL')), function() {
  Route::middleware([ 'auth' ])->group(function () {            
    Route::get('/inicio', 'HomeController@inicio')->name('inicio');      	
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('envios/guias/creada', 'Web\Dev\EnviosController@guia_creada')->name('envios.creacion');
    Route::post('envios/guias/salvacion', 'Web\Dev\EnviosController@storeAs')->name('envios.salvacion');
    Route::get('/envios/creacion', 'Web\Dev\EnviosController@creacion')->name('creacion');
    
    
    
    Route::name('envios.')->group(function () {
      Route::prefix('envios')->group(function () {
        Route::resource('', 'Web\Dev\EnviosController');
        //RECURSOS PARA COTIZACIONES
        Route::resource('cotizaciones', 'Web\Envios\CotizacionesController');
      });
    });

    //CONFIGURACION
    Route::resource('configuracion','Web\ConfiguracionController');
    //FIN CONFIGURACION

    //USUARIO
    Route::resource('usuario','Web\UsuarioController');
    //FIN USUARIO

    //CLIENTE
    Route::resource('cliente','Web\ClienteController');
    //FIN CLIENTE

  });
  //Fin del route->middleware->aut

  Auth::routes();
  Auth::routes([
    'register' => false // Register Routes...
  ]);         
});
//Fin del route->group->domain 
