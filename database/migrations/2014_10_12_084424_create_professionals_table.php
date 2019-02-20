<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionals', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
           /* $table->unsignedInteger('type_business_id');*/
            $table->string('description', 191)->nullable();
            $table->string('company_name', 100)->unique();
            $table->string('siret', 100)->unique();
            $table->string('TVA_intracom', 100)->unique();
            $table->integer('workforce', 10);
            $table->timestamps();

            //foreign key(s)
           /* $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type_business_id')->references('id')->on('business_types');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professionals');
    }
}
