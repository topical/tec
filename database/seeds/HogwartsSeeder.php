<?php

use Illuminate\Database\Seeder;

class HogwartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('school')->insert([
    		'name' => 'Hogwarts',
    		'zipcode' => 'B15L3',
    		'street' => 'Nokturngasse',
    		'town' => 'Hogwarts-City'
    	]);
    	
        DB::table('subject')->insert([
        	'name' => 'Zaubertränke'
        ]);
        
        DB::table('subject')->insert([
        	'name' => 'VgddK'
        ]);
    }
}
