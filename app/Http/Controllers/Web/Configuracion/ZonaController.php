<?php

namespace App\Http\Controllers\Web\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Log;
use Redirect;

use App\Models\Configuracion\Zona;
use App\Models\Configuracion\Mensajeria;

class ZonaController extends Controller
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
            $tabla = Zona::select('*','mensajeria.nombre AS mensajeria')
                    ->join('mensajeria','envios_zona.id_mensajeria', '=', 'clave')
                    ->get();

            $mensajeria = Mensajeria::where('estatus',1)
                            ->pluck('nombre','clave');
            
        } catch (Exception $e) {
                
        }

        return view('configuracion.zona.index' 
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
            
            $file = $request->file('zonaCSV');
            $handle = fopen($file->getRealPath(), "r");

            Zona::where('id_empresa',$idEmpresa)
                ->where('id_mensajeria',$idMensajeria)
                ->delete();
            
            fgetcsv($handle, 200, ",");
            while ( ($data = fgetcsv($handle, 200, ",")) !==FALSE) {
                Log::info(count($data));

                $zona = new Zona();
                $zona->grupo_origen = $data[0];
                $zona->grupo_destino = $data[1];
                $zona->zona = $data[2];
                $zona->id_empresa = $idEmpresa;
                $zona->id_mensajeria = $idMensajeria;
                
                $zona->save();

            };
            
            fclose($handle);

            $tmp = sprintf("Se agrego de forma correcta, las Zonas de Envio");
            $notices = array($tmp);
  
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

        return Redirect::route('zona.index') -> withSuccess ($notices);
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
