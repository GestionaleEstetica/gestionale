<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment_date', function (Blueprint $table) {
            $table->integer('date_id')->unsigned();
            $table->foreign('date_id')->references('id')->on('dates');

            $table->integer('treatment_id')->unsigned();
            $table->foreign('treatment_id')->references('id')->on('treatments');

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
        Schema::dropIfExists('treatment_date');
    }
}
