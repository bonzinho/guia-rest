<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantPhoto extends Model{

    protected $fillable = ['url', 'restaurant_id'];
    protected  $appends = ['full_url']; // campos virtuais para tratar dentro do elloquent
    public $timestamps = false; // Desativar timestamps, apra não dar erro de falta de campos

    protected function getFullUrlAttribute(){
        if($this->attributes['url']){
            return 'https://s3.'.env('AWS_DEFAULT_REGION').'.amazonaws.com/'.env('AWS_BUCKET').'/restaurant_photo/'.$this->attributes['url'];
        }
        return null;
    }
}