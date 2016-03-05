<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Circle;
use App\SessionData;
use App\Registration;
use App\Subject;
use App\Pupil;


class CircleController extends Controller
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
    public function index()
    {
       $circles = Circle::where('year', SessionData::getYear())->with('subject')->get();
       
        return view('/circle.index', [
        		'circles' => $circles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$subjects = Subject::orderBy('name')->get();
    	
    	$subjectmapping = [];
    	foreach($subjects as $subject) {
    		$subjectmapping[$subject->id] = $subject->name;
    	}
    	return view ('circle.create', [
    			'subjectmapping' => $subjectmapping
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
    			'subject_id' => 'required|exists:subject,id',
    			'grade' => 'required|numeric|min:3|max:13',
    	]);
    	$circle = Circle::create( [
    			'subject_id' => $request->subject_id,
    			'grade' => $request->grade,
    			'year' => SessionData::getYear()
    	]);
    	 
    	return redirect('circle');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$circle = Circle::findOrFail($id);
    	$pupils = $circle->pupils()->get();
    	return view('circle.show', [
    			'circle' => $circle,
    			'pupils' => $pupils,
    	]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
    	$circle = Circle::findOrFail($id);
    	
    	$grade = $circle->grade;
    	if (isset($request->grade)) {
    		$grade = $request->grade;
    	}
    	$pupils = Pupil::where('schoolenrolment', $circle->year - $grade + 1)->orderBy('surname')->get();
    	$registrations = Registration::where('circle_id', $circle->id);
    	
    	return view('circle.edit', [
    			'circle' => $circle,
    			'grade' => $grade,
    			'pupils' => $pupils,
    			'registrations' => $registrations
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
