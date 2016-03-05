<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Registration;

class RegistrationController extends Controller
{
    public function add(Request $request)
    {
    	$circle_id = $request->circle_id;
    	$pupil_id = $request->pupil_id;
    	
    	Registration::firstOrCreate([
    			'circle_id' => $circle_id,
    			'pupil_id' => $pupil_id
    	]);
    }
    
    public function remove(Request $request)
    {
    	$circle_id = $request->circle_id;
    	$pupil_id = $request->pupil_id;
    	 
    	Registration::where('circle_id', $circle_id)->where('pupil_id', $pupil_id)->delete();    	
    }
}
