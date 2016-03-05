<?php

use Illuminate\Database\Seeder;
use App\Circle;
use App\Batch;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$circles = Circle::all();
    	
    	foreach($circles as $circle){
    		$count = rand(0,4);
    		
    		foreach(range(1, $count) as $number) {
    			Batch::create( [
      			  	'maxscore' => rand(10,40), 
     		   		'circle_id' => $circle->id,
    				'seqno' => $number,
        		]);
    		}
    	}
    	foreach(range(1,20) as $index){
    		factory(App\Batch::class)->create();
    	}
    }
}
