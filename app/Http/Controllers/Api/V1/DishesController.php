<?php
namespace App\Http\Controllers\Api\V1;

use App\Dish;
use App\Http\Controllers\ApiControllerTrait;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class DishesController extends Controller
{
    use ApiControllerTrait;
    protected $model;
    protected $rules = [
        'name' => 'required',
        'restaurant_id' => 'required',
        'description' => 'required',
        'price' => 'required',
        'photo' => 'required',
    ];
    protected $messages = [
        'required' => ':attribute é obrigatório',
        'min' => ':attribute precisa de melo menos :min caracteres',
    ];

    public function __construct(Dish $model)
    {
        $this->model = $model;
    }



}