<?php

namespace App\Models\Envios;

use Illuminate\Database\Eloquent\Model;

use Log;

use App\Models\Envios\EnvioGrupo;
use App\Models\Envios\EnvioZona;
use App\Models\Envios\Costo;

class Cotizaciones extends Model
{
    public $origen = array();
    public $destino = array();
    public $zona = 1 ;
    public $cotizacion = array();
    public $precio = array();


    /**
     * Base para el calculo de las cotizaciones y precios.
     * 
     * @param cp_origen Codigo postal de Origen
     * @param cp_destino Codigo postal de Destino
     * @param peso valor de Kg que se redondeara a su valor siguiente enero
     * @return array
     */
    private function base($cp_origen, $cp_destino, $peso ){
        $this -> origen = EnvioGrupo::whereRaw('(? between cp_inicial and cp_final)', [$cp_origen])
               ->first();

        $this -> destino = EnvioGrupo::whereRaw('(? between cp_inicial and cp_final)', [$cp_destino])
               ->first(); 

        $this -> zonas = EnvioZona::where('grupo_origen', '=', $this -> origen -> grupo)
                -> where('grupo_destino', '=', $this -> destino -> grupo)
                ->first('zona');
    }

    /**
     * Calcula la tabla de catizaciones.
     * 
     * @param cp_origen Codigo postal de Origen
     * @param cp_destino Codigo postal de Destino
     * @param peso valor de Kg que se redondeara a su valor siguiente enero
     * @return array
     */
    public function cotizacion($cp_origen, $cp_destino, $peso ){

        $this -> origen = EnvioGrupo::whereRaw('(? between cp_inicial and cp_final)', [$cp_origen])
               ->first();

        $this -> destino = EnvioGrupo::whereRaw('(? between cp_inicial and cp_final)', [$cp_destino])
               ->first(); 

        Log::info($this -> destino);

        $this -> zonas = EnvioZona::where('grupo_origen', '=', $this -> origen -> grupo)
                -> where('grupo_destino', '=', $this -> destino -> grupo)
                ->first('zona');

        
        
        $costos = Costo::where('zona', '=', $this -> zonas -> zona)
                    ->where('peso', '=', ceil($peso))
                    ->get();

        foreach ($costos as $key => $value) {
            // code...
            Log::debug($value);
            $value -> tipo = ($value -> tipo == 1 ? 'Sobre' : 'Mi Embalaje');
            $this -> cotizacion[]= array('costo' => $value, 'destino' => $this -> destino, 'origen' => $this -> origen) ;

        }  
    }
    //Fin cotizacion

    /**
     * Calcula el precio del envio.
     * 
     * @param mensajeria, 
     * @return array
     */
    public function precio( $request ){
        Log::info(__FUNCTION__);
        Log::debug( $request->all() );
        
        $cp_origen  = $request->get('cp');
        $cp_destino = $request->get('cp_d');
        $pieza   = $request->get('pieza');
        $mensajeria = 1;//;$request->get('');
        $peso = 1;//       = ($request->get('embalaje') == 'sobre' ? 1 : 2 );

        if ( $request->get('embalaje') != 'sobre' ){
            $bascula   = ceil($request->get('bascula'));
            $dimensional   = ceil($request->get('dimensional'));
             Log::info($bascula);
             Log::info($dimensional);     

            $peso = max($bascula,$dimensional);  
        } 
        Log::info("Validar el peso");
        Log::info($peso);

        $this -> base( $cp_origen, $cp_destino, $peso );

        $precio = Costo::where('zona', '=', $this -> zonas -> zona)
                    ->where('peso', '=', ceil($peso) )
                    ->where('mensajeria', '=', $mensajeria )
                    ->first();
       
        $precio -> precio = $precio -> precio * $pieza;
        
        Log::info($precio);
        return $precio;
    }

    //fin precio
}
