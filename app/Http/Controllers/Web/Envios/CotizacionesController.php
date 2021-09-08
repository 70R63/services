<?php

namespace App\Http\Controllers\Web\Envios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;
use Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;  


use App\Models\Envios\Cotizaciones;


class CotizacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request);
        //$notices = array("La cotizacion no incluye iva ni seguros");
        //$request->session()->flash('notices',$notices);
        $cotizacion  = array();


        return view('envios/cotizacion/index', compact('cotizacion') );
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            Log::info(__FUNCTION__);
            Log::debug($request);
            $cp_origen = $request->input('cp');
            $cp_destino = $request->input('cp_d');
            $pesoEstimado = $request->input('peso');

            $cotizaciones = new Cotizaciones();
            $cotizaciones -> cotizacion($cp_origen, $cp_destino, $pesoEstimado);

            $cotizacion = $cotizaciones -> cotizacion  ; 
            Log::debug($cotizacion);    
        } catch (ModelNotFoundException $e) {
            Log::info(__FUNCTION__);
            Log::info("ModelNotFoundException");



            //$request->session()->flash('notices',array("Notices"));
            //$request->session()->flash('success',array("success"));

            return Redirect::back()
                ->with('notices',array($e->getMessage() ))
                ->withInput();


        } catch (Exception $e) {
            return Redirect::back()
                ->withErrors(array($e->getMessage() ))
                ->withInput();

            
        }
        
        return view('envios/cotizacion/index',compact('cotizacion') );

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
     * @param  \App\Models\Envios\Cotizaciones  $cotizaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Envios\Cotizaciones  $cotizaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotizaciones $cotizaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Envios\Cotizaciones  $cotizaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotizaciones $cotizaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Envios\Cotizaciones  $cotizaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizaciones $cotizaciones)
    {
        //
    }
}
