<?php

namespace App\Http\Controllers\Web\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Log;

use App\Models\Configuracion\Grupo;
use App\Models\Configuracion\Mensajeria;

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
            $tabla = Grupo::select('*','mensajeria.nombre AS mensajeria')
                            ->join('mensajeria', 'id_mensajeria', '=', 'mensajeria.clave')
                            ->get();
           
            $mensajeria = Mensajeria::where('estatus',1)
                            ->pluck('nombre','clave');

            
        } catch (Exception $e) {
                
        }

        return view('configuracion.grupo.index' 
                    ,compact('tabla', 'mensajeria')
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
        Log::info(__CLASS__." ".__FUNCTION__);
        try {
            $idMensajeria = $request->get('id_mensajeria');
            $idEmpresa  = 1;//Cambiar por valor dinamico
           
            $file = $request->file('grupoCSV');
            $handle = fopen($file->getRealPath(), "r");

            Grupo::where('id_empresa',$idEmpresa)
                ->where('id_mensajeria',$idMensajeria)
                ->delete();
            
            fgetcsv($handle, 200, ",");
            while ( ($data = fgetcsv($handle, 200, ",")) !==FALSE) {
                Log::info(count($data));

                $grupo = new Grupo();
                $grupo->cp_inicial = $data[0];
                $grupo->cp_final = $data[1];
                $grupo->grupo = $data[2];
                $grupo->entidad_federativa = $data[3];
                $grupo->id_empresa = $idEmpresa;
                $grupo->id_mensajeria = $idMensajeria;

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
