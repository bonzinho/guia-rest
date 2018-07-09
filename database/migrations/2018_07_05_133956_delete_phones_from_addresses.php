<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeletePhonesFromAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function(Blueprint $table){
            $table->dropColumn('phone');
            $table->dropColumn('phone_count');
        });

        Schema::table('restaurants', function(Blueprint $table){
            $table->string('phone')->after('photo')->nullable();
            $table->integer('phone_count')->after('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function(Blueprint $table){
            $table->string('phone')->after('distrito')->nullable();
            $table->integer('phone_count')->after('phone')->nullable();
        });

        Schema::table('restaurants', function(Blueprint $table){
            $table->dropColumn('phone');
            $table->dropColumn('phone_count');
        });
    }
}
