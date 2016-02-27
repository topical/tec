<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SessionData;

class SchoolYearController extends Controller
{
	public function index()
   	{
        return view('schoolyear.index', [
        	'year' => SessionData::getYear()
        ]);
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'year' => 'required|numeric|min:2010|max:2100'
    	]);
    	
    	SessionData::setYear($request->year);
    	
    	return redirect('/');
    }
}
