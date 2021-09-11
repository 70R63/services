<?php

namespace App\Http\Controllers\Web\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//USO GENERAL
use Log;
use Redirect;

//USO DE NEGOCIO
use App\Models\Configuracion\Mensajeria;

class MensajeriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            Log::info(__CLASS__." ".__FUNCTION__);    
            $tabla = Mensajeria::select('*')
            ->get();
        } catch (Exception $e) {
            $tabla = array();
            return view('configuracion.mensajeria.index' 
                    ,compact("tabla")
                );
        }

        return view('configuracion.mensajeria.index' 
                    ,compact("tabla")
                );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::debug(__CLASS__." ".__FUNCTION__); 
        try {

            $mensajeria = new Mensajeria();
            $mensajeria->fill($request->all());
            $mensajeria->clave = 1+ Mensajeria::max('clave');
            $mensajeria->save();

            $msj = sprintf("Se agrego de forma correcta, la Mensajeria");
            $notices = array($msj);
  
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

        return Redirect::route('mensajeria.index') -> withSuccess ($notices);
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
