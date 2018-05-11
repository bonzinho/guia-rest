<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model{
    protected $fillable = [
        'cod_postal',
        'address',
        'number',
        'localidade',
        'distrito',
        'complement'
    ];
}