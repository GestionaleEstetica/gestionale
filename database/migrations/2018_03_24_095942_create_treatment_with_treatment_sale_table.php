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
            $table->integer('treatment_id','tr_id');
            $table->integer('treatment_sale_id','tr_sale_id');

            $table->primary(['treatment_id','treatment_sale_id']);
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
