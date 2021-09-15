<?php

namespace App\Http\Controllers\Web\Envios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//USO GENERAL
use Log;
use Redirect;
use Exception;

//USO DE NEGOCIO

class EnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    const INDEX = 'envios.envio.index';

    public function index()
    {
        $tabla = array();
        try {
            Log::info(__CLASS__." ".__FUNCTION__);   
            /* 
            $tabla = Mensajeria::select('nombre','mensajeria.clave','mensajeria.estatus', 'estatus.clave as desc')
                    ->join('estatus', 'mensajeria.estatus', '=', 'estatus.estatus')
                ->get();
            */
            
            return view(self::INDEX
                    ,compact("tabla")
                );
        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__);
            Log::info($e);
            return view(INDEX 
                    ,compact("tabla")
                )->with('notices',array($e->getMessage() ));
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
