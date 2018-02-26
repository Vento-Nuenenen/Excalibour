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
            $points = DB::select('SELECT users.first_name, users.scoutname, users.last_name, GROUP_CONCAT(posten.max_points) as post_max_points, GROUP_CONCAT(posten.posten_name) as post_name, GROUP_CONCAT(p2u.reached_points) as post_points FROM p2u LEFT JOIN users ON users.id = p2u.fk_users LEFT JOIN posten ON posten.id = p2u.fk_posten GROUP BY users.id;');
            $posten = DB::select('SELECT * FROM posten;');

            $tn_bestanden = [];
            $tn_nicht_bestanden = [];
            $bestanden = [];

            foreach ($points as $point) {
                $point->post_name = explode(',', $point->post_name);
                $point->post_points = explode(',', $point->post_points);
                $point->post_max_points = explode(',', $point->post_max_points);

                if (count($point->post_points) > 0) {
                    for ($i = 0; $i < count($point->post_points); $i++) {
                        if (intval($point->post_points[$i]) >= floor(intval($point->post_max_points[$i])) / 2) {
                            $bestanden[] = $point->post_name[$i];
                        }
                    }
                }

                if (isset($point->post_points)) {
                    if (count($bestanden) > floor(count($posten) / 2)) {
                        $tn_bestanden[] = $point;
                    } else {
                        $tn_nicht_bestanden[] = $point;
                    }
                }
            }

            return view('pages.admin.home')->with(['bestanden' => $tn_bestanden, 'nicht_bestanden' => $tn_nicht_bestanden, 'posten_bestanden' => $bestanden]);
        }

        return view('pages.user.home');
    }
}
