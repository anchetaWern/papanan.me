<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantAmenitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_amenities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('business_id');
            $table->boolean('has_parking')->default(false);
            $table->boolean('has_outdoor_dining')->default(false);
            $table->boolean('has_wifi')->default(false);
            $table->boolean('accepts_credit_card')->default(false);
            $table->boolean('has_food_delivery')->default(false);
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
        Schema::dropIfExists('business_amenities');
    }
}
