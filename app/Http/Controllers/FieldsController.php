<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class FieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $fields = DB::table('field')->get();

        return view('fields.fields',['fields' => $fields]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('fields.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $field_name = $request->input('field_name');
	    $field_description = $request->input('field_description');
	    $field_points = $request->input('field_points');

	    DB::table('field')->insert(['name' => $field_name, 'description' => $field_description, 'MAX_POINTS' => $field_points]);

	    return redirect()->back()->with('message', 'Posten wurde erstellt.');
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $fid
	 * @return \Illuminate\Http\Response
	 */
    public function edit($fid)
    {
	    $fields = DB::table('field')->where('id','=',$fid)->first();

        return view('fields.edit',['fields' => $fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fid)
    {
	    $field_name = $request->input('field_name');
	    $field_description = $request->input('field_description');
	    $field_points = $request->input('field_points');

	    DB::table('field')->where('id','=',$fid)
		    ->update(['name' => $field_name, 'description' => $field_description, 'MAX_POINTS' => $field_points]);

	    return redirect()->back()->with('message', 'Posten wurde aktualisiert.');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $fid
	 * @return \Illuminate\Http\Response
	 */
    public function destroy($fid)
    {
	    DB::table('field')->where('id','=',$fid)->delete();

	    return redirect()->back()->with('message', 'Posten erfolgreich gelöscht.');
    }
}
