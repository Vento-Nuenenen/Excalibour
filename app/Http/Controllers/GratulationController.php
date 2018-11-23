<?php

namespace App\Http\Controllers;

use App\helper\helper;
use DB;
use Illuminate\Http\Request;
use PDF;
use App\helper\PDF_TextBox;

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

	    foreach ($users as $user){
		    $data = str_replace('@pfadiname',$user->scout_name,$data);
		    $data = str_replace('@exer',$user->exer_name,$data);

		    $data = helper::br2nl($data);


		    PDF::SetTitle(config('app.name'));
		    PDF::SetFont('Arial','B',18);
		    PDF::SetCreator(config('app.name'));
		    PDF::SetAuthor(config('app.name'));
		    PDF::SetTopMargin(50);

		    PDF::AddPage();
		    PDF::MultiCell(0,10, $data,0,'C');
	    }
	    return response(PDF::Output(), 200)->header('Content-Type', 'application/pdf');
    }
}
