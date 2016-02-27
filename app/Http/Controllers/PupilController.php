<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pupil;
use App\School;

class PupilController extends Controller
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
        $pupils = Pupil::with('school')->orderBy('surname')->orderBy('firstname')->orderBy('schoolenrolment')->get();
        return view('/pupil.index', [
        		'pupils' => $pupils
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$schools = School::orderBy('name')->get();
    	$schoolmapping = [];
    	foreach($schools as $school) {
    		$schoolmapping[$school->id] = $school->name . ' (' . $school->town . ')';
    	}
    	return view ('pupil.create', [
    			'schoolmapping' => $schoolmapping
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
    			'firstname' => 'required',
    			'surname' => 'required',
    			'grade' => 'required|numeric|min:3|max:13',
    			'school_id' => 'required|exists:school,id',	
    	]);
    	
    	$pupil = Pupil::create( [
    			'firstname' => $request->firstname,
    			'surname' => $request->surname,
    			'schoolenrolment' => Pupil::gradeToEnrolment($request->grade),
    			'letter' => $request->letter,
    			'school_id' => $request->school_id,
    			'street' => $request->street,
    			'town' => $request->town,
    			'zipcode' => $request->zipcode,
    	]);
    	
    	return redirect('pupil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$pupil = Pupil::findOrFail($id);
    	
    	return view('pupil.show', [
    			'pupil' => $pupil
    	]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$pupil = Pupil::findOrFail($id);
    	 
    	$schools = School::orderBy('name')->get();
    	$schoolmapping = [];
    	foreach($schools as $school) {
    		$schoolmapping[$school->id] = $school->name . ' (' . $school->town . ')';
    	}
    	
    	$pupil->grade = $pupil->getGrade();
    	
    	return view('pupil.edit', [
    			'pupil' => $pupil, 
    			'schoolmapping' => $schoolmapping,
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
    			'firstname' => 'required',
    			'surname' => 'required',
    			'grade' => 'required|numeric|min:3|max:13',
    			'school_id' => 'required|exists:school,id',
    	]);
    	 
    	$pupil = Pupil::findOrFail($id);
    	 
    	$pupil->firstname = $request->firstname;
    	$pupil->surname = $request->surname;
    	$pupil->setGrade( $request->grade );
    	$pupil->letter = $request->letter;
    	$pupil->school_id = $request->school_id;
    	$pupil->street = $request->street;
    	$pupil->town = $request->town;
    	$pupil->zipcode = $request->zipcode;
    	 
    	$pupil->save();
    	 
    	return redirect('pupil/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$pupil = Pupil::findOrFail($id);
    	
    	$pupil->delete();
    	
    	Session::flash('message', 'Die ausgewählte Schule wurde gelöscht');
    	
    	return redirect('pupil');
    }
}
