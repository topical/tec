<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject')->insert([
        	'name' => 'Mathematik'
        ]);
        
        DB::table('subject')->insert([
        	'name' => 'Biologie'
        ]);
        
        DB::table('subject')->insert([
        	'name' => 'Physik'
        ]);
        
        DB::table('subject')->insert([
        	'name' => 'Chemie'
        ]);
        
        DB::table('subject')->insert([
        	'name' => 'Informatik'
        ]);

        
        
    }
}
