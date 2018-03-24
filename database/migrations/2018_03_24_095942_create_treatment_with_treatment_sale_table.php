<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentWithTreatmentSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment_with_treatment_sale', function (Blueprint $table) {
            $table->integer('treatment_id')->unsigned();
            $table->integer('treatment_sale_id')->unsigned();

            $table->primary(['treatment_id','treatment_sale_id'],'linked_treatments');

            $table->foreign('treatment_id')->references('id')->on('treatments');
            $table->foreign('treatment_sale_id')->references('id')->on('treatment_sales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatment_with_treatment_sale');
    }
}
