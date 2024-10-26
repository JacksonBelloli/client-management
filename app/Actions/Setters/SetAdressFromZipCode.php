<?php

namespace App\Actions\Setters;

use App\Services\ZipCodeService;

class SetAdressFromZipCode
{   

    public static function setAddress($zip_code, $set)
    {
        $adress = ZipCodeService::getAddressByZipCode($zip_code);

        if(isset($adress['logradouro'])){
            $set('street', $adress['logradouro']);
            $set('district', $adress['bairro']);
            $set('city', $adress['localidade']);
            $set('state', $adress['uf']);        
        }
    }
}