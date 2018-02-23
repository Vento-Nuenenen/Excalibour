<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('print.certificate');
    }

    public function certificate(Request $request)
    {
        $data = $request->certificate_text;

        DB::select('SELECT * FROM users;');

        print_r($data);
    }
}
