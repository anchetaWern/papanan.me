<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->bigInteger('owner_id');
            $table->text('description')->nullable();
            $table->string('card_image')->nullable();
            $table->string('cover_image')->nullable();

            $table->string('address');
            $table->text('location');
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();

            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();

            $table->text('opening_hours')->nullable();

            $table->boolean('setup_complete')->default(false);

            $table->dateTime('approved_at')->nullable();
            $table->dateTime('denied_at')->nullable();

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
        Schema::dropIfExists('businesses');
    }
}
