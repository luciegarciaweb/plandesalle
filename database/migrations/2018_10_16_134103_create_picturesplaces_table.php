<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesplacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picturesplaces', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('place_id')->nullable();
            $table->string('picture_url')->nullable();
            $table->timestamps();

            //foreign key(s)
            $table->foreign('place_id')->references('id')->on('places');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('picturesplaces');
    }
}
