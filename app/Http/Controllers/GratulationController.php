<?php

namespace App\Http\Controllers;

use App\helper\helper;
use DB;
use Illuminate\Http\Request;
use PDF;

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
        $users = DB::table('participations')->leftJoin('exer', 'exer.id', '=', 'participations.FK_EXER')->get();

        foreach ($users as $user) {
            $text = $request->certificate_text;

            if(isset($user->scout_name)){
                $text = str_replace('@name', $user->scout_name, $text);
            }else{
                $text = str_replace('@name', $user->first_name, $text);
            }

            $text = str_replace('@exer', $user->exer_name, $text);

            $text = helper::br2nl($text);

            PDF::SetTitle(config('app.name'));
            PDF::SetFont('Arial', 'B', 18);
            PDF::SetCreator(config('app.name'));
            PDF::SetAuthor(config('app.name'));
            PDF::SetTopMargin(50);

            PDF::AddPage();
            PDF::MultiCell(0, 10, $text, 0, 'C');
        }

        return response(PDF::Output(), 200)->header('Content-Type', 'application/pdf');
    }
}
