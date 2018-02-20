<?php

namespace App\Http\Controllers;

use Auth;
use DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
        	$points = DB::select("SELECT * FROM users LEFT JOIN p2u ON users.id = p2u.fk_users LEFT JOIN posten ON posten.id = p2u.fk_posten;");

        	print_r($points);

            //return view('pages.admin.home');
        }

        return view('pages.user.home');
    }

    public function import()
    {
        return view('usersmanagement.import');
    }
}
