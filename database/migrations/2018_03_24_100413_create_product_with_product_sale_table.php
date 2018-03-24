<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductWithProductSellTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_with_product_sale', function (Blueprint $table) {
            $table->integer('product_id','pr_id');
            $table->integer('product_sale_id','pr_sale_id');

            $table->primary(['product_id','product_sale_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_with_product_sale');
    }
}
