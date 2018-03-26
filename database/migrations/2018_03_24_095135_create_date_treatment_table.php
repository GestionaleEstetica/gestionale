<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDateTreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_treatment', function (Blueprint $table) {
            $table->integer('date_id')->unsigned();
            $table->foreign('date_id')->references('id')->on('dates')->onDelete('cascade');

            $table->integer('treatment_id')->unsigned();
            $table->foreign('treatment_id')->references('id')->on('treatments')->onDelete('cascade');

            $table->primary(['date_id','treatment_id'],'date_and_treatment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('date_treatment');
    }
}
