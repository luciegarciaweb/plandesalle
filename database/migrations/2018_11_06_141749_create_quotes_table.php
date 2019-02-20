<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event');
            $table->integer('number_people');
            $table->string('disposition')->nullable();
            $table->string('start_date');
            $table->string('end_date');
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->boolean('is_strict')->default(false)->nullable();
            $table->boolean('is_regular')->default(false)->nullable();
            $table->string('catere');
            $table->boolean('is_dance')->default(false)->nullable();
            $table->boolean('is_accommodate')->default(false)->nullable();
            $table->string('budget')->nullable();
            $table->string('description')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone');
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
        Schema::dropIfExists('quotes');
    }
}
