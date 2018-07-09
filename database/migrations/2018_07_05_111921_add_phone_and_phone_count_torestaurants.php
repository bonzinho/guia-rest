<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneAndPhoneCountTorestaurants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('php artisan ', function(Blueprint $table){
            $table->string('phone')->after('distrito')->nullable();
            $table->integer('phone_count')->after('phone')->nullable();
        });
    }

    /**S
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function(Blueprint $table){
            $table->dropColumn('phone');
            $table->dropColumn('phone_count');
        });
    }
}
