<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model{
    protected $fillable = ['name', 'description', 'photo', 'phone', 'phone_count'];
    protected  $appends = ['photo_full_url']; // campos virtuais para tratar dentro do elloquent

    protected function getPhotoFullUrlAttribute(){
        if($this->attributes['photo']){
            return 'https://s3.'.env('AWS_DEFAULT_REGION').'.amazonaws.com/'.env('AWS_BUCKET').'/restaurante/'.$this->attributes['photo'];
        }
        return null;
    }

    public function address(){
        return $this->hasOne(Address::class);
    }

}