<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
    	$this->call(SchoolTableSeeder::class);
    	$this->call(PupilTableSeeder::class);
    	$this->call(HogwartsSeeder::class);
    	$this->call(SubjectSeeder::class);
    }
}
