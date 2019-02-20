<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('department_code');
            $table->string('insee_code');
            $table->string('zip_code');
            $table->string('name');
            $table->string('slug')->unique();
            $table->double('gps_lat', 16,14);
            $table->double('gps_lng', 17,14);
            
            //foreign key(s)
            $table->foreign('department_code')->references('code')->on('departments')->onDelete('cascade');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
