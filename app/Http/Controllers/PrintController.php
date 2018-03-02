<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use PDF;

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
        $users = DB::select("SELECT * FROM users LEFT JOIN role_user ON users.id = role_user.user_id LEFT JOIN roles ON role_user.role_id = roles.id WHERE( roles.name = '1. Exer' OR roles.name = '2. Exer');");

        $data = nl2br($data);

        foreach ($users as $user) {
            $data = str_replace('@pfadiname', $user->scoutname, $data);
            $data = str_replace('@exer', $user->name, $data);

            $pdf = PDF::loadView('print.template', ['data' => $data]);
        }

        return $pdf->stream('download.pdf');

        exit();
    }
}
