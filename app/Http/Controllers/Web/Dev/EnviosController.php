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

class EnviosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
        try {        
            
            
            $solicitud = new Solicitud();
            $solicitud -> procesarDatos($request -> all());
            $solicitud -> cargarDTO();
            $solicitud -> enviar();
            
            $parameters=Array(
                'idGuia'=>$solicitud -> idGuia,
                'remitente' => $solicitud -> remitenteResumen,
                'destinatario' => $solicitud -> destinatarioResumen,
            );
            
            #dd($solicitud);
            if(!$solicitud->estatus)
                return \Redirect::route('creacion')
                    ->with('notices',array($solicitud -> mensaje_error))
                    ->withInput();    
            
            return \Redirect::route('envios.creacion')
                ->with($parameters)
                ->withSuccess(array("La solicitud fue exitosa"));
            
        } catch (Exception $e) {
            
            return \Redirect::route('creacion')
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
        try {        
            
            Log::debug(print_r($request->all(),true));
            $solicitud = new Solicitud();
            $solicitud -> procesarDatos($request -> all());
            $solicitud -> cargarDTO();
            $solicitud -> enviar();
            
            return response()->json( $request -> all());
            
           
        } catch (Exception $e) {
            dd($e);
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
        //Log::info( $request->all() );
        //Log::info( $request->get('mensajeria') );

        return view('envios/creacion', compact("id"));
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
        $envio = new Cotizaciones();

        $precio = $envio -> precio($request);
        
        return $precio;
    }
}

