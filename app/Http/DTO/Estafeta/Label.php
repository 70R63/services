<?php
namespace App\Http\DTO\Estafeta;

use Spatie\DataTransferObject\DataTransferObject;
use App\Http\DTO\Estafeta\LabelDescription;

use Spatie\DataTransferObject\FieldValidator as Validator;


class Label extends DataTransferObject 
{
    /** @var string */
    public $suscriberId = "28";
    
    /** @var string */
    public $customerNumber = "0000000";

     /** @var string */
    public $password = "lAbeL_K_11";

     /** @var string */
    public $login = "prueba1";

     /** @var boolean */
    public $valid = true;
    
    /** @var int */
    public $quadrant = 0;

    /** @var int */
    public $paperType = 1;

    /** @var int */
    public $labelDescriptionListCount = 1;    

    public LabelDescription $labelDescriptionList ; 

    
}