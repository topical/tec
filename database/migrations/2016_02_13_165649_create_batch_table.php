<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seqno')->unsigned();
            $table->integer('maxscore')->unsigned();
            $table->integer('circle_id')->unsigned();
            $table->foreign('circle_id')->references('id')->on('circle');
            $table->unique(['circle_id', 'seqno']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('batch');
    }
}
