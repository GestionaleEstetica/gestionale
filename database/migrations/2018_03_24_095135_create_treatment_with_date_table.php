<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentWithDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment_with_date', function (Blueprint $table) {
            $table->integer('date_id')->unsigned();
            $table->integer('treatment_id')->unsigned();

            $table->primary(['date_id','treatment_id'],'date_and_treatment');

            $table->foreign('date_id')->references('id')->on('dates');
            $table->foreign('treatment_id')->references('id')->on('treatments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatment_with_date');
    }
}
