<?php

namespace App\Models\Envios;

use App\Http\DTO\Estafeta\OriginInfo;
use App\Http\DTO\Estafeta\DestinationInfo;
use App\Http\DTO\Estafeta\DrAlternativeInfo;
use App\Http\DTO\Estafeta\LabelDescriptionList;

final class Solicitud 
{
	public $remitente;
	public $destinatario;
	public $labelDescriptionList;

	/**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function procesar(array $datos) : void
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
}