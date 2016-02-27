<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pupil;

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
        $pupils = Pupil::orderBy('surname')->orderBy('firstname')->orderBy('schoolenrolment')->get();
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
    	return view ('pupil.create');
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
    			'schoolenrolment' => 'required',
    			
    	]);
    	
    	$pupil = Pupil::create( [
    			'firstname' => $request->firstname,
    			'surname' => $request->surname,
    			'schoolenrolment' => $request->schoolenrolment,
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
    	 
    	return view('pupil.edit', [
    			'pupil' => $pupil
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
    			'schoolenrolment' => 'required',
    			
    	]);
    	 
    	$pupil = Pupil::findOrFail($id);
    	 
    	$pupil->firstname = $request->firstname;
    	$pupil->surname = $request->surname;
    	$pupil->schoolenrolment = $request->schoolenrolment;
    	$pupil->school = $request->school;
    	$pupil->street = $request->street;
    	$pupil->town = $request->town;
    	$pupil->zipcode = $request->zipcode;
    	 
    	$pupil->save();
    	 
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
    	$pupil = Pupil::findOrFail($id);
    	
    	$pupil->delete();
    	
    	Session::flash('message', 'Die ausgewählte Schule wurde gelöscht');
    	
    	return redirect('pupil');
    }
}
