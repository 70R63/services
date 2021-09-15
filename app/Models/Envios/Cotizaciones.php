<?php

namespace App\Models\Envios;

use Illuminate\Database\Eloquent\Model;

use Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;  

use App\Models\Envios\EnvioGrupo;
use App\Models\Envios\EnvioZona;
use App\Models\Configuracion\Precio;

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
    private function base($cp_origen, $cp_destino ){
        Log::info(__CLASS__." ".__FUNCTION__);
        $this -> origen = EnvioGrupo::whereRaw('(? between cp_inicial and cp_final)', [$cp_origen])
               ->first();

        $this -> destino = EnvioGrupo::whereRaw('(? between cp_inicial and cp_final)', [$cp_destino])
               ->first(); 

        if ($this -> origen -> grupo === $this -> destino -> grupo){
            $this->zonas = new EnvioZona();
            $this->zonas->zona = 1;
        } else{
            $this -> zonas = EnvioZona::where('grupo_origen', '=', $this -> origen -> grupo)
                -> where('grupo_destino', '=', $this -> destino -> grupo)
                ->first('zona');
        }
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
        Log::info(__CLASS__." ".__FUNCTION__);
        $this -> origen = EnvioGrupo::whereRaw('(? between cp_inicial and cp_final)', [$cp_origen])
               ->first();

        $this -> destino = EnvioGrupo::whereRaw('(? between cp_inicial and cp_final)', [$cp_destino])
               ->first(); 

        Log::info(is_null( $this -> origen ));

        if ( is_null($this->origen) or is_null($this->destino) ) {
            $tmp = sprintf("No se puede cotizar con los CP '%s' y '%s'",$cp_origen, $cp_destino );
            throw new ModelNotFoundException($tmp);
        }
        Log::info("Origen - Destino");
        Log::info($this -> origen->count()." ". $this -> destino->count() );
        
        Log::debug($this -> origen);
        Log::debug($this -> destino);

        Log::info("EnvioZona");
        $this -> zonas = EnvioZona::where('grupo_origen', '=', $this -> origen -> grupo)
                -> where('grupo_destino', '=', $this -> destino -> grupo)
                ->first('zona');
        Log::debug($this -> zonas);
        Log::info($this -> zonas);
        if ( is_null($this -> zonas) or count($this -> zonas) == 0 ) {
            Log::info("No hay zona de envio o es is_null");
            $tmp = sprintf("Sin cobertura favor de contactar a su ejente de ventas");
            throw new ModelNotFoundException($tmp);
        }
        Log::info("Precio");
        $precio = Precio::where('zona', '=', $this -> zonas -> zona)
                    ->where('peso', '=', ceil($peso))
                    ->get();
        Log::debug($precio);

        if ( is_null($precio) or count($precio) == 0 ) {
            Log::info("El precio es null");
            $tmp = sprintf("Sin cobertura en la Zona '%s' o Peso '%s' kg",$this -> zonas -> zona, $peso );
            throw new ModelNotFoundException($tmp);
        }

        foreach ($precio as $key => $value) {
            $value -> tipo_envio = ($value -> tipo_envio == 1 ? 'Sobre' : 'Mi Embalaje');
            $this -> cotizacion[]= array('costo' => $value, 'destino' => $this -> destino, 'origen' => $this -> origen) ;

        }  
        Log::debug($this -> cotizacion);
    }
    //Fin cotizacion

    /**
     * Calcula el precio del envio.
     * 
     * @param mensajeria, 
     * @return array
     */
    public function precio( $request ){
        Log::info(__CLASS__." ".__FUNCTION__);
        Log::debug( $request->all() );
        
        $cp_origen  = $request->get('cp');
        $cp_destino = $request->get('cp_d');
        $piezas   = 1; //$request->get('pieza');
        $mensajeria = 1;//;$request->get('');
        $tipoEnvio  = $request->get('tipo_envio');

        $pesoMax = 0;
        if ( $tipoEnvio ==  1 ){
            Log::info("Calculo para sobre");
            $piezas    = $request->get('pieza');
            $pesoMax =  1;  
        } elseif ( $tipoEnvio == 2) {
            Log::info("Calculo para piezas");
            $piezas    = $request->get('pieza');
            $pesoBascula = $request->get('peso');
            $dimensional = $request->get('dimensional');
            Log::info("Peso Bascula ".$pesoBascula);
            Log::info("Peso Dimensional ".$dimensional);
            $pesoMax = max($pesoBascula,$dimensional);
            Log::info("Peso que se usara para el calculo, peso = ".$pesoMax);
        } else {
            
            $pesoArray = $request->get('peso');
            $altoArray = $request->get('alto');
            $anchoArray = $request->get('ancho');
            $largoArray = $request->get('largo');

            $piezas = count($pesoArray);
            $pesoBascula = 0;
            $dimensional = 0;
            Log::info("Calculo para Multipiezas - Cantidad ".$piezas);
            for ($i=0; $i < $piezas; $i++) { 
                $pesoBascula += $pesoArray[$i] ;

                $dimensional += ($altoArray[$i]*$anchoArray[$i]*$largoArray[$i])/5000;
            }
            Log::info("Peso Bascula ".$pesoBascula);
            Log::info("Peso Dimensional ".$dimensional);
            $pesoMax = max($pesoBascula,$dimensional);
            Log::info("Peso que se usara para el calculo, peso = ".$pesoMax);

        }
        $pesoMaxEntero = ceil($pesoMax);
        Log::info("Validar el peso");
        $this -> base( $cp_origen, $cp_destino, $pesoMaxEntero );

        $precio = Precio::where('zona', '=', $this -> zonas -> zona)
                    ->where('peso', '=', $pesoMaxEntero )
                    ->where('id_mensajeria', '=', $mensajeria )
                    ->first();
       
        $precio -> precio = $precio -> precio * $piezas;
        $precio->piezas = $piezas;
        
        Log::info($precio);
        return $precio;
    }

    //fin precio


    /**
     * Calcula el precio del envio.
     * 
     * @param mensajeria, 
     * @return array
     */
    public function precioTmp( $request ){

    }
    //FIN Calculo multiPieza
}
