<?php

namespace App\Models\Envios;

use App\Http\DTO\Estafeta\OriginInfo;
use App\Http\DTO\Estafeta\DestinationInfo;
use App\Http\DTO\Estafeta\DrAlternativeInfo;
use App\Http\DTO\Estafeta\LabelDescriptionList;

use App\Http\DTO\Estafeta\Label;
use App\Http\DTO\Estafeta\LabelDescription;
use App\Http\DTO\Estafeta\OriginInfo;
use App\Http\DTO\Estafeta\DestinationInfo;
use App\Http\DTO\Estafeta\DrAlternativeInfo;

final class Solicitud 
{
	public $remitente;
	public $destinatario;
	public $labelDescriptionList;
    private $labelDTO;
    private $clienteSOAP;

	
    /**
     * Constructor para incializar activdad de la solicitud de envios.
     * 
     * @param 
     * 
     * @return void
     */
    public function __construct() : void
    {
         /* Se inicializa el WS para DEV*/
            $wsdl = config('soap.estafeta_dev');

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
        $response = $this -> clienteSOAP -> createLabel($this -> labelDTO);

        

        file_put_contents("/home/javier/Documents/JorgeRomero/estafeta/label.pdf", $response->labelPDF);
        
    }



}