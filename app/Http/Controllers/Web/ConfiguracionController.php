<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Log;

use App\Models\Configuracion\Configuracion;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Configuracion::where('estatus','=', 1)
                    ->get();

        //dd($config);

        return view('configuracion.index',
            compact("config"));
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
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        //
        //Log::info(__FUNCTION__." ".$id);
        $config = Configuracion::find($id);
               
        /*$rack  = Rack::all();
        
        $equipoHisorial = EquipoHistorial::where('id_equipo','=',$id)
                        ->orderBy('id', 'desc')
                        ->get();
        */
        Log::debug($config);
        //Log::debug("Equipo Controller edit ".$equipoHisorial);
        return view('configuracion.editar'
            , compact('config') 
        );

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
        Log::info(__FUNCTION__.' '.$id);
        
        $item = Configuracion::findOrFail($id);
        $item -> fill($request->all());
        
        $item -> save();

        $tmp = sprintf("Actualizacion correcta de %s con id %d", $item -> propiedad, $item->valor);
        $notices = array($tmp);

        return \Redirect::route('configuracion.index') -> withSuccess ($notices);
        
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
