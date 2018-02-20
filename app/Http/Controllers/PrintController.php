<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PrintController extends Controller
{
	/**
	 * Create a new controller instance.
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(){
		return view('print.certificate');
	}

	public function certificate(Request $request){
		$data = $request->certificate_text;

		DB::select("SELECT * FROM users;");

		print_r($data);
	}
}
