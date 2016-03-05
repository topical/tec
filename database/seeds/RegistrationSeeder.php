<?php

use Illuminate\Database\Seeder;
use App\Circle;
use App\Pupil;
use App\Registration;

class RegistrationSeeder extends Seeder
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
    		$pupils = Pupil::where('schoolenrolment', $circle->year - $circle->grade + 1)->get();
    		
    		$count = rand(0,min(10, $pupils->count()));
    		if($count == 0){
    			continue;
    		}
    		
    		if( $count == 1 ) {
    			$pupil = $pupils->random();
    			
    			Registration::create( [
    				'circle_id' => $circle->id,
    				'pupil_id' => $pupil->id
    			]);
    		} else {
				$pupils = $pupils->random($count);
    			
    			foreach($pupils as $pupil) {
    				Registration::create( [
    					'circle_id' => $circle->id,
    					'pupil_id' => $pupil->id
    				]);
	    		}
    		}
    	}
    }
}
