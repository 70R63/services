<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Log;
use \Exception;
use Redirect;

use App\Models\Cliente\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cliente = Cliente::all();

        return view('cliente.index'
                ,compact("cliente")
            );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.crear'
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
        try {
            Log::info(__CLASS__." ".__FUNCTION__);
            Log::info($request);
            $item = new Cliente();
            $item -> fill($request->all());
            
            //throw new Exception("Error Processing Request", 1);
            
            $item -> save();

        } catch (Exception $e) {
            Log::info("Cliente ".__FUNCTION__);
            Log::debug($e);
            //$notices = array("La cotizacion no incluye iva ni seguros");
            //$request->session()->flash('notices',$notices);

            return Redirect::back()
                ->withErrors(array($e->getMessage()))
                ->withInput();
            
        }
 
        return redirect()
                ->route('cliente.index')
                ->with('success', array('Usuario Creado con exito!'));
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
        try {
            $cliente = Cliente::findOrFail($id);
               
            Log::debug($cliente);
            return view('cliente.editar'
            , compact('cliente') 
        );

        } catch (Exception $e) {
                
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
        try {
            Log::info(__FUNCTION__.' '.$id);
        
            $item = Cliente::findOrFail($id);
            $item -> fill($request->all());
            
            $item -> save();

            $tmp = sprintf("Actualizacion correcta del Cliente con '%s'", $item->razon_social);
            $notices = array($tmp);

            return \Redirect::route('cliente.index') -> withSuccess ($notices);
        } catch (Exception $e) {
             Log::info(__FUNCTION__.' '.$id);
             Log::debug($e);
                    
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
