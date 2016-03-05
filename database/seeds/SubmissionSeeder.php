<?php

use Illuminate\Database\Seeder;
use App\Circle;
use App\Pupil;
use App\Batch;
use App\Submission;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $circles = Circle::all();
        foreach ($circles as $circle) {
        	$pupils = $circle->pupils()->get();
        	$batches = $circle->batches()->get();
        	
        	foreach ($pupils as $pupil) {
        		foreach ($batches as $batch) {
        			Submission::create( [
        					'batch_id' => $batch->id,
        					'pupil_id' => $pupil->id,
        					'score' => rand(0, $batch->maxscore)
        			]);
        		}
        	}
        }
    }
}
