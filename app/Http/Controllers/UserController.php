<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->get();
        
        return view('user.index', [
        	'users' => $users
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('user.create');
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
        	'name' => 'required',
        	'email' => 'required|email',
        	'password' => 'required|confirmed|min:6',
        ]);
        
        $user = User::create( [
        	'name' => $request->name, 
        	'email' => $request->email,
        	'password' => bcrypt($request->password),
        	'admin' => isset($request->admin),
        ]);
        
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        return view('user.show', [
        	'user' => $user
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
    	$user = User::findOrFail($id);
    	
    	return view('user.edit', [
    			'user' => $user
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
    		'name' => 'required',
        	'email' => 'required|email'
    	]);
    	
    	$user = User::find($id);
    	
    	$user->name = $request->name;
        $user->email = $request->email;
        $user->admin = isset($request->admin);
    	
    	$user->save();
    	
    	return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( $id == Auth::user()->id)
        	return "Der Nutzer darf nicht gel&ouml;scht werden.";
        
        User::destroy($id);
        
        return redirect('user');
    }
}
