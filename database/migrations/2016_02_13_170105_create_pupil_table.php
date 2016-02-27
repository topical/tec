<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePupilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('pupil', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('firstname');
    		$table->string('surname');
    		$table->integer('schoolenrolment')->unsigned();
    		$table->integer('school_id')->unsigned();
    		$table->foreign('school_id')->references('id')->on('school');
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
    	Schema::drop('pupil');
    }
}
