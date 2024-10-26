<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ZipCodeService
{

    public static function getAddressByZipCode(string $zipCode): object
    {
        $zipCode = str_replace('-', '', $zipCode);

        $url = "https://viacep.com.br/ws/{$zipCode}/json/";

        $address = Http::get($url);

        return $address;
    }
}
