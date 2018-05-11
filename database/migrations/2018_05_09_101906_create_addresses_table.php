<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function(Blueprint $table){
           $table->increments('id');
            $table->string('cod_postal');
            $table->string('address');
            $table->string('number');
            $table->string('city');
            $table->string('localidade');
            $table->string('distrito');
            $table->string('complement')->nullable();
            $table->integer('restaurant_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('addresses');
    }
}
