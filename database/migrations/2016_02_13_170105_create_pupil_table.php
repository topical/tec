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
    		$table->string('firstname')->unique();
    		$table->string('surname')->unique();
    		$table->integer('schoolenrolment')->unsigned();
    		$table->string('school')->unique();
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
