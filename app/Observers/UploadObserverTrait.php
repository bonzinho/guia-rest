<?php

namespace App\Observers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadObserverTrait{

    protected  function sendFile($model){
        $field = $this->field;
        if($model->$field->isValid()){
            $this->upload($model);
        }

    }

    protected  function removeFile($model){
        $field = $this->field;
        Storage::delete($this->path . $model->$field);

    }

    protected  function updateFile($model){
        $field = $this->field;
        if(is_a($model->$field, UploadedFile::class) and $model->$field->isValid()){

            $previous_image = $model->getOriginal($field); // get original image
            $this->upload($model);

            Storage::delete($this->path . $previous_image); // Delete previous image
        }

    }

    protected function upload($model){

        $field = $this->field;

        $extension = $model->$field->extension(); // get file extension
        $name = bin2hex(openssl_random_pseudo_bytes(8)); // random name
        $name = $name .'.'. $extension; //concat name and extension

        $model->$field->storeAs($this->path, $name); // Sendo to S3 Amazon
        $model->$field = $name; // update with name for db


    }

}