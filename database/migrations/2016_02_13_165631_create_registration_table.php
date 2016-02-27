<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('registration', function (Blueprint $table) {
    		$table->increments('id');
    		$table->integer('circle_id')->unsigned();
    		$table->foreign('circle_id')->references('id')->on('circle');
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
    	Schema::drop('registration');
    }
}
