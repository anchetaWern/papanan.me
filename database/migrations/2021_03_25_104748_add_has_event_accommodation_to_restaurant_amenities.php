<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHasEventAccommodationToRestaurantAmenities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurant_amenities', function (Blueprint $table) {
            $table->boolean('has_event_accommodation')->after('has_outdoor_dining');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurant_amenities', function (Blueprint $table) {
            $table->dropColumn('has_event_accommodation');
        });
    }
}
