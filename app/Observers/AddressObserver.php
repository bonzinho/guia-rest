<?php

namespace App\Observers;

use App\Address;
use AnthonyMartin\GeoLocation\GeoLocation;

class AddressObserver{

    public function creating(Address $model){

        if (!$model->latitude or $model->longitude){
            $this->setLatAndLong($model);
        }
    }
    public function updating(Address $model){
        $this->setLatAndLong($model);
    }

    private function setLatAndLong($model){
        // Metodo responsavel por pegar o endereço e saber a latitude e longitude
        // composer require anthonymartin/geo-location

        $location  = $model->address . ',' . $model->number . ' , ' . $model->cod_postal . ' ' . $model->localidade;

        $response = GeoLocation::getGeocodeFromGoogle($location);
        if (!empty($response->results) and is_array($response->results)) {
            $result = array_pop($response->results);
            $model->latitude = $result->geometry->location->lat;
            $model->longitude = $result->geometry->location->lng;
        }
    }


}