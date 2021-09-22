<?php

namespace App\Http\Controllers\Web\Dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/* Inico de configuracion personalizada*/
//USO GENERAL
use Log;
use Redirect;
use Exception;
use Spatie\DataTransferObject\DataTransferObjectError;

use App\Http\DTO\Estafeta\Tracking\ExecuteQuery;
use App\Http\DTO\Estafeta\Tracking\SearchType;
use App\Http\DTO\Estafeta\Tracking\SearchConfiguration;

//Modelos
use App\Models\Envios\Solicitud;
use App\Models\Envios\Cotizaciones;
use App\Models\Configuracion\Mensajeria;


class EnviosController extends Controller
{
    const INDEX = 'envios.envio.index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::info(__CLASS__." ".__FUNCTION__); 
        $data = $request->all();

        try{

            /* Se inicializa el WS para DEV*/
            $wsdl = config('soap.estafeta');

            $path_to_wsdl = sprintf("%s%s",resource_path(), $wsdl );
            Log::debug($path_to_wsdl);
            $client = new \SoapClient($path_to_wsdl, array('trace' => 0));
            ini_set("soap.wsdl_cache_enabled", "0");
            $labelDTO = new Label($data);

            $response =$client->createLabel($labelDTO);
            
            return response()->json([
                'codigo' => $response->globalResult->resultCode,
                'descripcion' => $response->globalResult->resultDescription
                ,'pdf'  => base64_encode($response->labelPDF)
            ]);
                 

        } catch (DataTransferObjectError $exception) {

             return response()->json([
                'codigo' => "11",
                'descripcion' => $exception->getMessage()
                ,'pdf'  => null
                ]);

        }
    }

    /**
     * Valida el estado del servicio.
     *
     * @return \Illuminate\Http\Response
     */
    public function seguimiento( Request $request )
    {
        Log::info(__CLASS__." ".__FUNCTION__); 
        try{
            /* Se inicializa el WS para DEV*/
            $wsdl = config('soap.estafeta_tracking_dev');
            
            $path_to_wsdl = sprintf("%s%s",resource_path(), $wsdl );
            Log::debug($path_to_wsdl);
            $client = new \SoapClient($path_to_wsdl, array('trace' => 0));
            ini_set("soap.wsdl_cache_enabled", "0");
            $data = $request -> all();
            $executeDTO = new ExecuteQuery($data);
            $response =$client->executeQuery($executeDTO);

            return response()->json($response);

        } catch (Exception $e) {
            Log::debug($e->getMessage());
        }
    }

    /**
     * Crea una solicitud de guia hacia el broker del servicio
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info(__CLASS__." ".__FUNCTION__);
        $tipo = $request->get('tipo_envio');   
        try {
            Log::info($request);
            $solicitud = new Solicitud();
            $solicitud -> procesarDatos($request -> all());
            $solicitud -> cargarDTO();
            $solicitud -> enviar();
            
            
            $parameters=Array(
                'idGuia'=>$solicitud -> idGuia,
                'remitente' => $solicitud->remitenteResumen,
                'destinatario' => $solicitud->destinatarioResumen,
            );
            
            
            if(!$solicitud->estatus){
                Log::info(__CLASS__." ".__FUNCTION__." Estatus Error");
                return \Redirect::route('creacion', ['tipo'=>$tipo])
                    ->with('notices',array($solicitud -> mensaje_error))
                    ->withInput();    
            }
            
            return \Redirect::route('envios.creacion')
                ->with($parameters)
                ->withSuccess(array("La solicitud fue exitosa"));
            
        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__);
            return \Redirect::route('creacion', ['tipo'=>$tipo])
                    ->withErrors(array($solicitud -> mensaje_error))
                    ->withInput();
        }
    }


    /**
     * Guarda la solicitud de guia hacia el broker del servicio de forma temporal o incompleta
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAs(Request $request)
    {
        Log::info(__CLASS__." ".__FUNCTION__);
        try {        
            
            Log::debug($request->all());
            $pieza = $request->get('pieza');
            $remitente = $request->get('nombre');
            $destinatario =  $request->get('nombre_d');
            $mensajeria =  $request->get('id_mensajeria');

            return response()->json([
                'clave'         => '200'
                ,'pieza'        => $pieza
                ,'mensajeria'   => $mensajeria
                ,'remitente'    => $remitente
                ,'destinatario' => $destinatario
                ,'estatus'  => 'exitoso'
                ]);
            
           
        } catch (Exception $e) {
           return response()->json([
                'clave' => "500"
                ,'estatus'  => 'fallo'
                ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @route  envios.creacion
     * @return view
     */
    public function guia_creada(Request $request)
    {
        Log::info(__CLASS__." ".__FUNCTION__);

        Log::debug($request->all());
        $leyenda = "llegue";
        return view('envios/guia', compact('leyenda') );
    }


    public function creacion($id)
    {
        Log::info(__CLASS__." ".__FUNCTION__);
        $mensajeria = Mensajeria::where('estatus',1)
                            ->pluck('nombre','clave');

        return view('envios/creacion', compact('id', 'mensajeria'));
    }

    /**
     * Valida el precio del envio.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @route  api.envios.precio
     * @return json
     */
    public function precio(Request $request)
    {
        Log::info(__CLASS__." ".__FUNCTION__);
        Log::debug($request->all());
        Log::info($request->all());
        
        $cotizacion = new Cotizaciones();

        $precio = $cotizacion -> precio($request);
        
        return $precio;
    }
}

