<?php

namespace App\Http\Controllers\Web\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//USO GENERAL
use Log;
use Redirect;
use Exception;

//USO DE NEGOCIO
use App\Models\Configuracion\Estatus;
use App\Models\Configuracion\TipoEnvio;

class TipoEnvioController extends Controller
{
     const INDEX = 'configuracion.tipoenvio.index';
     const EDITAR = 'configuracion.tipoenvio.editar';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info(__CLASS__." ".__FUNCTION__);
        try {
               
            $tabla = TipoEnvio::select('tipo_envio.*',  'estatus.clave as desc')
                    ->join('estatus', 'tipo_envio.estatus', '=', 'estatus.estatus')
                    ->get();

            return view(self::INDEX 
                    ,compact("tabla")
                );
         } catch (ModelNotFoundException $e) {
            Log::info(__CLASS__." ".__FUNCTION__);
            Log::info("ModelNotFoundException");

            return Redirect::back()
                ->with('notices',array($e->getMessage() ))
                ->withInput();

         } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__);
            Log::info($e);
            $tabla = array();
            return view(self::INDEX 
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
        Log::info(__CLASS__." ".__FUNCTION__); 
        try {
             $tipoEnvio = TipoEnvio::where('clave', '=',$id)
            ->first();
            Log::debug("edit ".$tipoEnvio);

            $estatus = Estatus::pluck('clave','estatus');
 
            return view(self::EDITAR 
                    ,compact("tipoEnvio", "estatus")
                );

        } catch (ModelNotFoundException $e) {
            Log::info(__CLASS__." ".__FUNCTION__);
            Log::info("ModelNotFoundException");
            return Redirect::back()
                ->with('notices',array($e->getMessage() ))
                ->withInput();

        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__);

            return Redirect::back()
                ->withErrors(array($e->getMessage() ))
                ->withInput();
        }
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
        Log::info(__CLASS__." ".__FUNCTION__); 
        try {
            $item = TipoEnvio::findOrFail($id);
            $item -> fill($request->all());
            $item -> save();
            $tmp = sprintf("Actualizacion correcta del Tipo de envio '%s'", $item->nombre);
            $notices = array($tmp);
            return \Redirect::route('tipoenvio.index') -> withSuccess ($notices);

        } catch (ModelNotFoundException $e) {
            Log::info(__CLASS__." ".__FUNCTION__);
            Log::info("ModelNotFoundException");
            return Redirect::back()
                ->with('notices',array($e->getMessage() ))
                ->withInput();

        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__);

            return Redirect::back()
                ->withErrors(array($e->getMessage() ))
                ->withInput();
        }
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
