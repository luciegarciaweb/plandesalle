<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('place_id');
            $table->unsignedInteger('price_id')->nullable();
            $table->unsignedInteger('accommodation_id')->nullable();
            $table->unsignedInteger('option_id')->nullable();
            $table->unsignedInteger('equipment_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description');
            $table->boolean('is_dancing')->default(true);
            $table->boolean('is_seat')->default(true);
            $table->boolean('is_stand')->default(true);
            $table->integer('min_capacity_stand');
            $table->integer('max_capacity_stand');
            $table->integer('min_capacity_seat');
            $table->integer('max_capacity_seat');
            $table->integer('surface');
            $table->timestamps();

            //foreign key(s)
            $table->foreign('place_id')->references('id')->on('places');
            $table->foreign('price_id')->references('id')->on('prices');
            $table->foreign('accommodation_id')->references('id')->on('accommodations');
            $table->foreign('option_id')->references('id')->on('options');
            $table->foreign('equipment_id')->references('id')->on('equipments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
