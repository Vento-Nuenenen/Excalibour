<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $users = DB::table('users')->leftJoin('group','group.id','=','users.FK_GRP')->select('users.*','group.name')->get();

	    return view('users.users',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $groups = DB::table('group')->select('id', 'name')->get();

	    return view('users.add',['groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $scout_name = $request->input('scout_name');
	    $first_name = $request->input('first_name');
	    $last_name = $request->input('last_name');
	    $email = $request->input('email');
	    $group = $request->input('group');

	    $password = $request->input('password');
	    $password_repeat= $request->input('password_repeat');

	    if($password === $password_repeat){
	    	$password = Hash::make($password);
	    	$password_repeat = null;

		    DB::table('users')->insert(['scout_name' => $scout_name, 'first_name' => $first_name, 'last_name' => $last_name,'email' => $email,'password' => $password,'FK_GRP' => $group]);

		    return redirect()->back()->with('message', 'Benutzer wurde erstellt.');
	    }else{
	    	return redirect()->back()->with('error','Passwort wurde nicht korrekt wiederholt!');
	    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
