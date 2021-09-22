<?php

namespace App\Http\Controllers\logistic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* Inico de configuracion personalizada*/

use Spatie\DataTransferObject\DataTransferObjectError;
use \Log;

use App\Http\DTO\Estafeta\Label;
use App\Http\DTO\Estafeta\LabelDescription;
use App\Http\DTO\Estafeta\OriginInfo;
use App\Http\DTO\Estafeta\DestinationInfo;
use App\Http\DTO\Estafeta\DrAlternativeInfo;

use App\Http\DTO\Estafeta\Tracking\ExecuteQuery;
use App\Http\DTO\Estafeta\Tracking\SearchType;
use App\Http\DTO\Estafeta\Tracking\SearchConfiguration;

class EstafetaController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
