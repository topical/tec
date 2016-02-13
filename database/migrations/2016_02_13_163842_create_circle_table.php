<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCircleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('circle', function (Blueprint $table) {
    		$table->increments('id');
    		$table->integer('year');
    		$table->integer('grade');
    		$table->integer('subject_id')->unsigned();
    		$table->foreign('subject_id')->references('id')->on('subject');
    		$table->unique(['year', 'grade', 'subject_id']);
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
         Schema::drop('circle');
    }
}
