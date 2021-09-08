<?php

namespace App\Http\Controllers\Web\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Log;
use File;

use App\Models\Configuracion\Precio;

class PrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info(__FUNCTION__);    
        $precios = Precio::all();

        $tabla = array();
        foreach ($precios as $key => $precio) {
            Log::info($precio->tipo_envio);
            $tabla[$precio->tipo_envio][$precio->peso][] = 
            array('zona'=>$precio->zona ,'precio'=>$precio->precio);
        }
        
        return view('configuracion.precio.index' 
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
        Log::info(__FUNCTION__); 
        return view('configuracion.precio.index.tabla'
             
            );
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
        //$handle = fopen($file, "r");
        //$handle = ( File::get($file->getRealPath()) );
        
        
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMasivo()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMasivo(Request $request)
    {
        $file = $request->file('precioCSV');
        $handle = fopen($file->getRealPath(), "r");
        //dd( $handle );
        
        fgetcsv($handle, 200, ",");
        while ( ($data = fgetcsv($handle, 200, ",")) !==FALSE) {

            //array_push($array, $all_data);
            Log::info($data);
            
            for ($i=1; $i < 9; $i++) { 
                $precio = new Precio();
                $precio->tipo_envio = $data[0];
                $precio->peso = $data[1];
                $precio->precio = $data[$i+1];
                $precio->zona = $i;
                $precio->save();
            }
        };
        
        fclose($handle);

        $tmp = sprintf("La tabla base de precio se agrego de forma correcta");
        $notices = array($tmp);

        return \Redirect::route('precio.index') -> withSuccess ($notices);
    }

    public function fileUpload(Request $req){
        $req->validate([
        'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);
    }
}
