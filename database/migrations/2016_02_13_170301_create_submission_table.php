<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submission', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('score')->unsigned();
            $table->integer('batch_id')->unsigned();
            $table->foreign('batch_id')->references('id')->on('batch');
            $table->integer('pupil_id')->unsigned();
            $table->foreign('pupil_id')->references('id')->on('pupil');
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
        Schema::drop('submission');
    }
}
