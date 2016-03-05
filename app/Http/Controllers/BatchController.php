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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
    	 
    	return redirect('batch/' . $batch->id);
    		
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
    	$circle = $batch->circle()->get();
    	$pupils = $circle->pupils()->get();
    	$submissions = $batch->submissions()->get();
    	
    	return view('batch.edit', [
    			'batch' => $batch,
    			'circle' => $circle,
    			'pupils' => $pupils,
    			'submissions' => $submissions,
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
    			'year' => 'required',
    			'grade' => 'required|numeric|min:3|max:13',
    	]);
    	 
    	$circle = Circle::findOrFail($id);
    	 
    	$circle->year = $request->year;
    	$circle->setGrade( $request->grade );
    	 
    	$circle->save();
    	 
    	return redirect('circle/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$circle = circle::findOrFail($id);
    	
    	$circle->delete();
    	
    	Session::flash('message', 'Die ausgewählte Korrespondenz wurde gelöscht');
    	
    	return redirect('circle');
    }
}

