<?php

namespace App\Http\Controllers\Api\V1;
use Laravel\Lumen\Routing\Controller;
use App\Restaurant;
//use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Facades\Excel;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Restaurant $model)
    {
        $this->model = $model;
    }

    public function downloadExcel(){
        $data = $this->model->all();
        Excel::create('Laravel Excel', function($excel)use($data) {
            $excel->sheet('Excel sheet', function($sheet) use ($data) {
                foreach ($data as $row){
                    $row = $row->toArray();
                    $sheet->fromArray(array($row), null, 'A1', false, false);
                }
            });
        })->store('xls')->download();
        //return response()->download($teste);
    }
}
