<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait ApiControllerTrait{

    /**
     * Filtra os dados com base na query string
     *
     *  Exemplos:
     *
     * ?limit=15
     * ?order=created_at, desc
     * ?where[id]=2
     * ?like[name]=vitor
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request){

        $data = $request->all();
        //$limit = $data['limit'] ?? 20;   PHP 7
        $limit = empty($data['limit']) ? $data['limit'] : 20;
        $order = empty($data['order']) ? $data['limit'] : null;
        if($order != null){
            $order = explode(',', $order);
        }
        $order[0] = $order[0] ?? 'id';
        $order[1] = $order[1] ?? 'asc';

        $where = $data['where'] ?? [];
        $like = null;
        if(is_array($data['like'])){
            $like = $data['like'];
            $key = key(reset($like));
            $like[0] = $key
            $like[1] = '%'.$like[$key].'%';
        }

        $results = $this->model
            ->order($order[0], $order[1])
            ->where(function($query) use ($like){
                if($like){
                    return $query->where($like[0], 'like', $like[1]);
                }
                return $query;
            })
            ->where($where)
            ->with($this->relationships())
            ->paginate($limit);
        return response()->json($results);
    }

    protected function relationships(){
        if(isset($this->relationships)){
            return $this->relationships;
        }
        return [];
    }
}