<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model{
    protected $fillable = [
        'cod_postal',
        'address',
        'number',
        'localidade',
        'city',
        'distrito',
        'complement',
        'phone',
        'phone_count',
    ];


    public function restaurant(){
        // Belongs to porque o campo restaurant_id está na tabela Address (relacionamento 1 para 1)
        return $this->belongsTo(Restaurant::class);
    }

}