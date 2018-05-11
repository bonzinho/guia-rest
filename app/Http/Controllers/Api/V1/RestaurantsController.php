<?php

namespace App\Http\Controllers\Api\V1;

use App\Address;
use App\Http\Controllers\ApiControllerTrait;
use App\Restaurant;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class RestaurantsController extends Controller{

    use ApiControllerTrait;

    protected $model;
    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required',
    ];
    protected $messages = [
        'required' => ':attribute é obrigatório!',
        'min' => ':attribute deve ter no minio %s caracteres',
    ];

    protected $relationships = ['address'];

    public function __construct(Restaurant $model)
    {
        $this->model = $model;
    }

    public function address(Request $request, $id){
        $restaurant = $this->model->findOrFail($id);
        $address = $restaurant->address;

        if(!$address){
            $address = \App\Address::create($request->all());
        }else{
            $address->update($request->all());
        }

        $restaurant->address()->save($address); // Salva a relação entre restaurante e address
        return response()->json($address);
    }

    public function upload(Request $request, $id){
        $result = $this->model->findOrFail($id);
        $data['photo'] = $request->file('photo');
        $result->update($data);
        return response()->json($result);
    }

}