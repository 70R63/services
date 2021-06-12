<?php
namespace App\Http\DTO\Estafeta;

use Spatie\DataTransferObject\DataTransferObject;

use App\Http\DTO\Estafeta\OriginInfo;
use App\Http\DTO\Estafeta\DestinationInfo;
use App\Http\DTO\Estafeta\DrAlternativeInfo;

class LabelDescriptionList extends DataTransferObject 
{
    public string $aditionalInfo = "string";
    public string $content ="string";
    public string $contentDescription = "string";
    public string $costCenter = "string";
    public bool $deliveryToEstafetaOffice = false;
    public string $destinationCountryId = "MX";
    public string $effectiveDate = "20210608";
    public int $numberOfLabels = 1;
    public string $officeNum = "130";
    public string $originZipCodeForRouting = "62250";
    public int $parcelTypeId = 4;
    public string $reference = "string";
    public bool $returnDocument = false;
    public string $serviceTypeId = "70";
    public string $serviceTypeIdDocRet = "50";
     /** @var boolean */
    public $valid = true;
    public float $weight = 1.1;

    public OriginInfo $originInfo ;
    public DestinationInfo $destinationInfo ;
    public DrAlternativeInfo $DRAlternativeInfo;

}