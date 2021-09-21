<?php

namespace App\Models\Envios;

use Log;
use Storage;
use Exception;

use App\Http\DTO\Estafeta\Label;
use App\Http\DTO\Estafeta\LabelDescription;
use App\Http\DTO\Estafeta\LabelDescriptionList;
use App\Http\DTO\Estafeta\OriginInfo;
use App\Http\DTO\Estafeta\DestinationInfo;
use App\Http\DTO\Estafeta\DrAlternativeInfo;


final class Solicitud 
{
	private $remitente;
	private $destinatario;
	public $labelDescriptionList;
    private $labelDTO;
    private $clienteSOAP;

    public $idGuia = 000000000000000;
    public $remitenteResumen = array();
    public $destinatarioResumen = array();
    public $mensaje_error = "";
    public $estatus = false;
	
    /**
     * Constructor para incializar activdad de la solicitud de envios.
     * 
     * @param 
     * 
     * @return void
     */
    public function __construct() 
    {
         /* Se inicializa el WS para DEV*/
            $wsdl = config('soap.estafeta');

            $path_to_wsdl = sprintf("%s%s",resource_path(), $wsdl );
            Log::debug($path_to_wsdl);
            $this -> clienteSOAP = new \SoapClient($path_to_wsdl, array('trace' => 0));
            ini_set("soap.wsdl_cache_enabled", "0");
          
    }

    /**
     * Destructor para incializar activdad de la solicitud de envios.
     * 
     * @param 
     * 
     * @return void
     */
    function __destruct() {
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function procesarDatos(array $datos) : void
    {
        Log::info(__CLASS__." ".__FUNCTION__);
    	$this -> remitente = new OriginInfo ([
    		"address1" 		=> $datos['calle']
    		,"address2"		=>	$datos['numero']
    		,"cellPhone"	=>	$datos['telefono']
    		
    		,"contactName"	=>	$datos['nombre']
    		,"corporateName"=>	$datos['compania']
    		,"neighborhood"	=>	$datos['colonia']
    		,"phoneNumber"	=>	$datos['telefono']
    		,"state"		=>	$datos['entidad_federativa']
    		,"zipCode"		=>	$datos['cp']
    		
    		]
    	);

    	$this -> destinatario = new DestinationInfo ([
    		"address1" 		=> $datos['calle_d']
    		,"address2"		=>	$datos['numero_d']
    		,"cellPhone"	=>	$datos['telefono_d']
    		
    		,"contactName"	=>	$datos['nombre_d']
    		,"corporateName"=>	$datos['compania_d']
    		,"neighborhood"	=>	$datos['colonia_d']
    		,"phoneNumber"	=>	$datos['telefono_d']
    		,"state"		=>	$datos['entidad_federativa_d']
    		,"zipCode"		=>	$datos['cp_d']
    		
    		]
    	);

    	$this -> labelDescriptionList = new LabelDescriptionList([
    		"originInfo"	=>	$this -> remitente
    		,"destinationInfo"=>$this -> destinatario
    		,"DRAlternativeInfo"=> new DrAlternativeInfo()
    	]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function cargarDTO() : void
    {
        Log::info(__CLASS__." ".__FUNCTION__);
        $this -> labelDTO = new Label([
            "labelDescriptionList" => $this -> labelDescriptionList
        ]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function enviar() : void
    {
        Log::info(__CLASS__." ".__FUNCTION__);
        try {
            $response = $this -> clienteSOAP -> createLabel($this -> labelDTO);
            
            Log::debug(print_r($response->globalResult->resultSpanishDescription,true));
            Log::debug(print_r($response->globalResult->resultCode,true));

            if ( $response -> globalResult -> resultCode != 0 )
                throw new Exception("Error en Broker", 1);
     

            foreach ($response -> labelResultList as $key => $list) {
                // code...
                Log::debug(print_r($list->resultCode,true));    
                Log::debug(print_r($list->resultSpanishDescription,true));
                $namePDF = sprintf("%s.pdf",$list->resultSpanishDescription);

                $this -> idGuia = $list->resultSpanishDescription;
                Log::debug(print_r($namePDF,true));
                Log::debug(print_r(config('filesystems.disks' ),true));   
                Storage::disk('public')->put($namePDF, $response->labelPDF);             

            }
            Log::info(__CLASS__." ".__FUNCTION__."Armando Resultado");
            $this -> remitenteResumen = $this->remitente;
            $this -> destinatarioResumen = $this->destinatario;
            $this -> estatus = true;        
        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__);
            Log::debug($e->getMessage());
            $this -> mensaje_error($response);
            
        }

    }

    /**
     * Captura el mensaje de error .
     *
     * @return void
     */

    private function mensaje_error($response){
        Log::info(__CLASS__." ".__FUNCTION__);

        Log::debug(print_r($response -> labelResultList,true));
        $msj = ",";
        foreach ($response -> labelResultList as $key => $value) {
            $msj = sprintf("%s %s ",$msj, $value-> resultSpanishDescription);
        }
        Log::info("Contruyendo Response");        
        $this -> mensaje_error = sprintf("COD%s - %s - BROKER %s",
            $response->globalResult->resultCode
            , $response->globalResult->resultSpanishDescription
            , $msj
        );
        Log::info("Fin ".__CLASS__." ".__FUNCTION__);
    }

}