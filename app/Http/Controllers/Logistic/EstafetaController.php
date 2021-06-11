<?php

namespace App\Http\Controllers\logistic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* Inico de configuracion personalizada*/

use App\Http\DTO\Estafeta\Label;
use Spatie\DataTransferObject\DataTransferObjectError;

use App\Http\DTO\Estafeta\LabelDescription;
use App\Http\DTO\Estafeta\OriginInfo;
use App\Http\DTO\Estafeta\DestinationInfo;
use App\Http\DTO\Estafeta\DrAlternativeInfo;

class EstafetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        #$data = \Input::all();
        $data = $request->all();
        

        try{
          
            $path_to_wsdl = sprintf("%s%s",resource_path(), config('soap.estafeta') );
            $client = new \SoapClient($path_to_wsdl, array('trace' => 0));
            ini_set("soap.wsdl_cache_enabled", "0");

            $labelDTO = new Label($data);
            $response =$client->createLabel($labelDTO);

            $salida = sprintf("Codigo %s, Descripcion %s",$response->globalResult->resultCode,$response->globalResult->resultDescription ); 
          
            return response()->json([
                'name' => "ulalala",
                'state' => $salida
                ,'pdf'  => base64_encode($response->labelPDF)
            ]);
                 

        } catch (DataTransferObjectError $exception) {

                 return response()->json([
                    'name' => "ulalalaFail",
                    'state' => $exception->getMessage()
                    ,'pdf'  => null
                ]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
