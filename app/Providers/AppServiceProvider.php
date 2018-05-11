<?php

namespace App\Providers;

use App\Dish;
use App\Observers\DishObserver;
use App\Observers\RestaurantPhotoObserver;
use App\RestaurantPhoto;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Observers\RestaurantObserver;
use App\Restaurant;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Schema::defaultStringLength(191);
        Restaurant::observe(RestaurantObserver::class);
        RestaurantPhoto::observe(RestaurantPhotoObserver::class);
        Dish::observe(DishObserver::class);
    }

    /**composer require appzcoder/lumen-routes-list
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
