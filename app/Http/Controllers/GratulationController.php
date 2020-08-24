<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;
use PDF;
use Illuminate\Http\Request;

class GratulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view('info.gratulation');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $users = DB::table('participations')->leftJoin('exer', 'exer.id', '=', 'participations.FK_EXER')->get();

        foreach ($users as $user) {
            $text = $request->certificate_text;

            if (isset($user->scout_name)) {
                $text = str_replace('@name', $user->scout_name, $text);
            } else {
                $text = str_replace('@name', $user->first_name, $text);
            }

            $text = str_replace('@exer', $user->exer_name, $text);

            $text = Helper::br2nl($text);

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
