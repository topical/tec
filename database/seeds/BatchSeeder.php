<?php

use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach(range(1,20) as $index){
    		factory(App\Batch::class)->create();
    	}
    }
}
