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
            $points = DB::select('SELECT * FROM users INNER JOIN p2u ON users.id = p2u.fk_users INNER JOIN posten ON posten.id = p2u.fk_posten ORDER BY last_name;');
            $posten = DB::select('SELECT * FROM posten;');

            $tn_bestanden = [];
            $tn_nicht_bestanden = [];

            foreach ($points as $point) {
                $bestanden = 0;

                if (isset($point->reached_points)) {
                    if ($point->reached_points > ($point->max_points % 2)) {
                        $bestanden++;
                    }

                    if ($bestanden > (count($posten) % 2)) {
                        $tn_bestanden[] = $point;
                    } else {
                        $tn_nicht_bestanden[] = $point;
                    }
                }
            }

            return view('pages.admin.home')->with(['bestanden' => $tn_bestanden, 'nicht_bestanden' => $tn_nicht_bestanden]);
        }

        return view('pages.user.home');
    }

    public function import()
    {
        return view('usersmanagement.import');
    }
}
