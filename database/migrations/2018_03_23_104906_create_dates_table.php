<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dates', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->date('date');
            $table->time('time');
            $table->boolean('done');
            $table->string('description',128)->default("");
            $table->timestamps();

            //$table->primary(['client_id','date']);

            $table->foreign('client_id')->references('id')->on('clients');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dates');
    }
}
