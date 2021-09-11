<?php

namespace App\Http\Controllers\Web\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Log;

use App\Models\Configuracion\Grupo;

class GrupoController extends Controller
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
            $grupo = Grupo::all();
            $tabla = array();

            
        } catch (Exception $e) {
                
        }

        return view('configuracion.grupo.index' 
                    ,compact("grupo")
                );
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
        try {
            //dd($request);
            $file = $request->file('grupoCSV');
            $handle = fopen($file->getRealPath(), "r");
            
            fgetcsv($handle, 200, ",");
            while ( ($data = fgetcsv($handle, 200, ",")) !==FALSE) {
                Log::info(count($data));

                $grupo = new Grupo();
                //$grupo->fill($data);
                $grupo->cp_inicial = $data[0];
                $grupo->cp_final = $data[1];
                $grupo->grupo = $data[2];
                $grupo->entidad_federativa = $data[3];
                $grupo->save();

            };
            
            fclose($handle);

            $tmp = sprintf("La tabla base de Grupos Postales se agrego de forma correcta");
            $notices = array($tmp);
  

        } catch (Exception $e) {
            
        }

        return \Redirect::route('grupo.index') -> withSuccess ($notices);
        
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
