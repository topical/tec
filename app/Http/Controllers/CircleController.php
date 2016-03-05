<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Circle;
use App\SessionData;
use App\Registration;
use App\Subject;


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
    	
    	return view ('circle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	//
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
    public function edit($id)
    {
    	$circle = Circle::findOrFail($id);
    	 
    	$subjects = Subject::orderBy('name')->get();
    	foreach($subjects as $subject) 
    	
    	$circle->grade = $circle->getGrade();
    	$circle->year = $circle->getYear();
    	
    	return view('circle.edit', [
    			'circle' => $circle, 
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
