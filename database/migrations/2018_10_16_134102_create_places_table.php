<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('environment_id')->nullable();
            $table->unsignedInteger('typeplace_id')->nullable();
            $table->unsignedInteger('city_id');
            $table->boolean('is_bookmarked')->default(false);
            $table->boolean('is_privatized')->default(false);
            $table->boolean('is_validated')->default(true);
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description');
            $table->string('address');
            $table->integer('surface');
            $table->integer('persQuantity');
            $table->integer('roomQuantity');
            $table->double('gps_lat', 16,14);
            $table->double('gps_lng', 17,14);
            $table->timestamps();

            //foreign key(s)
            $table->foreign('environment_id')->references('id')->on('environments');
            $table->foreign('typeplace_id')->references('id')->on('typeplaces');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
