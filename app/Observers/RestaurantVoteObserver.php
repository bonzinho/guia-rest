<?php

namespace App\Observers;

use App\RestaurantVote;
use App\Restaurant;

class RestaurantVoteObserver{

    public function creating(RestaurantVote $model){
        $points = $model
            ->where('restaurant_id', $model->restaurant_id)
            ->avg('points'); // Vai buscar a pontuação média da base de dados

        $restaurant = Restaurant::find($model->restaurant_id);
        $restaurant->points = $points;
        $restaurant->votes_qtd +=1;
        $restaurant->update();
    }

    public function deleting(RestaurantVote $model){
        $this->removeFile($model);
    }

    public function updating(RestaurantVote $model){
        $this->updateFile($model);
    }

}