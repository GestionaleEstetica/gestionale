<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleTreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_treatment', function (Blueprint $table) {
            $table->integer('sale_id')->unsigned();
            $table->foreign('sale_id')->references('id')->on('sales');

            $table->integer('treatment_id')->unsigned();
            $table->foreign('treatment_id')->references('id')->on('treatments');

            $table->primary(['sale_id','treatment_id'],'sale_and_treatment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_treatment');
    }
}
