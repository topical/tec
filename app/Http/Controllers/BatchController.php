<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Batch;
use App\SessionData;
use App\Registration;
use App\Subject;
use App\Circle;
use App\Submission;
use App\Pupil;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$circle = Circle::findOrFail($request->circle_id);
        $batches = Batch::where('circle_id', $request->circle_id)->orderBy('seqno')->get();
       
        return view('/batch.index', [
        		'batches' => $batches,
        		'circle' => $circle
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	$circle = Circle::findOrFail($request->circle_id);
    	$batch = Batch::where('circle_id', $request->circle_id)->orderBy('seqno', 'DESC')->first();
    	$seqno = 1;
    	if(isset($batch)) {
    		$seqno = $batch->seqno + 1;
    	}
    	return view ('batch.create', [
    			'circle' => $circle,
    			'seqno' => $seqno
    	]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
    			'circle_id' => 'required|exists:circle,id',
    			'maxscore' => 'required|numeric|min:1|max:40',
    	]);
    	$batch = Batch::create( [
    			'circle_id' => $request->circle_id,
    			'maxscore' => $request->maxscore,
    			'seqno' => $request->seqno, 
    	]);
    	 
    	return redirect('batch/' . $batch->id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$batch = Batch::findOrFail($id);
    	$circle = $batch->circle;
    	$pupils = $circle->pupils()->orderBy('surname')->get();
    	$submissions = $batch->submissions()->get();
    	
    	$scores = [];
    	
    	foreach ($submissions as $submission) {
    		$scores[$submission->pupil_id] = $submission->score;
    	}
    	
    	return view('batch.edit', [
    			'batch' => $batch,
    			'circle' => $circle,
    			'pupils' => $pupils,
    			'scores' => $scores,
    			'maxscore' => $batch->maxscore
    	]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    			'maxscore' => 'required|numeric|min:1|max:40',
    	]);
    	    	 
    	$batch = Batch::findOrFail($id);
    	 
    	$batch->maxscore = $request->maxscore;
    	 
    	$batch->save();
    	
    	foreach ($request->scores as $pupil_id => $score) {
    		if ($score !="" ) {
    			$submission = Submission::firstOrCreate([
    				'pupil_id' => $pupil_id,
    				'batch_id' => $batch->id,
    			]);
    			
    			if ($submission->score != $score) {
    				$submission->score = $score;
    				$submission->save();
    			}
    		} else {
    			Submission::where('pupil_id', $pupil_id)->where('batch_id', $batch->id)->delete();
    		}
    	}
    	 
    	return redirect('circle/' . $batch->circle_id . '/analyze');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	
    }
}

