<?php

use Illuminate\Database\Seeder;

class CircleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach(range(1,15) as $index){
        	factory(App\Circle::class)->create();
        }
    }
}
