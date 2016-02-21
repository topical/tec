<?php

use Illuminate\Database\Seeder;

class PupilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,20) as $index){
        	factory(App\Pupil::class)->create();
        }
    }
}
