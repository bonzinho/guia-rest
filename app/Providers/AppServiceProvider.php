<?php

namespace App\Providers;

use App\Address;
use App\Dish;
use App\Observers\AddressObserver;
use App\Observers\DishObserver;
use App\Observers\RestaurantPhotoObserver;
use App\Observers\RestaurantVoteObserver;
use App\RestaurantPhoto;
use App\RestaurantVote;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Observers\RestaurantObserver;
use App\Restaurant;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Schema::defaultStringLength(191);
        Address::observe(AddressObserver::class);
        Restaurant::observe(RestaurantObserver::class);
        RestaurantPhoto::observe(RestaurantPhotoObserver::class);
        RestaurantVote::observe(RestaurantVoteObserver::class);
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
