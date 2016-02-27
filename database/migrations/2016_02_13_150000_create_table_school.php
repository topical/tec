<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSchool extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{
    	Schema::create('school', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('name');
    		$table->string('street');
    		$table->string('zipcode');
    		$table->string('town');
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
        //
    }
}
