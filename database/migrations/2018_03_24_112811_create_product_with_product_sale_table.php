<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductWithProductSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_with_product_sale', function (Blueprint $table) {
          $table->integer('product_id')->unsigned();
          $table->integer('product_sale_id')->unsigned();

          $table->primary(['product_id','product_sale_id'],'linked_products');

          $table->foreign('product_id')->references('id')->on('products');
          $table->foreign('product_sale_id')->references('id')->on('product_sales');
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
