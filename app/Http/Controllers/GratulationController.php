<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class GratulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('info.gratulation');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
	    $data = $request->certificate_text;
	    $users = DB::table('participations')->leftJoin('exer', 'exer.id', '=', 'participations.FK_EXER')->get();
	    $data = nl2br($data);
	    foreach ($users as $user) {
		    $data = str_replace('@pfadiname', $user->scout_name, $data);
		    $data = str_replace('@exer', $user->exer_name, $data);
		    $pdf = PDF::loadView('print.template', ['data' => $data]);
	    }
	    return $pdf->stream('download.pdf');
	    exit();
    }
}
