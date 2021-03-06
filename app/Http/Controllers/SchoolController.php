<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\School;
use App\Pupil;
use App\SessionData;
use Session;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::orderBy('name')->get();
        
        return view('school.index', [
        	'schools' => $schools
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('school.create');
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
        	'name' => 'required'
        ]);
        
        $school = School::create( [
        	'name' => $request->name, 
        	'street' => $request->street,
        	'town' => $request->town,
        	'zipcode' => $request->zipcode,
        ]);
        
        return redirect('school');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::findOrFail($id);
        
        $registrations = 
        	Pupil::join('registration', 'pupil.id', '=', 'registration.pupil_id')->
        	join('circle', 'registration.circle_id', '=', 'circle.id')->
        	join('subject', 'circle.subject_id', '=', 'subject.id')->
        	where('pupil.school_id', $school->id)->
        	where('circle.year', SessionData::getYear())->
        	get();
        
        return view('school.show', [
        	'school' => $school,
        	'registrations' => $registrations	
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
    	$school = School::findOrFail($id);
    	
    	return view('school.edit', [
    			'school' => $school
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
    			'name' => 'required'
    	]);
    	
    	$school = School::findOrFail($id);
    	
    	$school->name = $request->name;
    	$school->street = $request->street;
    	$school->town = $request->town;
    	$school->zipcode = $request->zipcode;
    	
    	$school->save();
    	
    	return redirect('school/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = School::findOrFail($id);
        
        $school->delete();
        
        Session::flash('message', 'Die ausgewählte Schule wurde gelöscht');
        
        return redirect('school');
    }
}
