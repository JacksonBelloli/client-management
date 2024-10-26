<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'cpf_cnpj',
        'email',
        'phone',
        'zip_code',
        'street',
        'number',
        'complement',
        'city',
        'district',
        'state',
    ];
}
