<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
	    if ($request->input('search') == null) {
		    $first = DB::table('participations')
			    ->leftJoin('group', 'group.id', '=', 'participations.FK_GRP')
			    ->leftJoin('exer', 'exer.id', '=', 'participations.FK_EXER')
			    ->where('exer.id','=','1')->get();

		    $second = DB::table('participations')
			    ->leftJoin('group', 'group.id', '=', 'participations.FK_GRP')
			    ->leftJoin('exer', 'exer.id', '=', 'participations.FK_EXER')
			    ->select('participations.*', 'exer.exer_name', 'group.group_name')
			    ->where('exer.id','=','2')->get();
	    } else {
		    $search_string = $request->input('search');

		    $first = DB::table('participations')
			    ->leftJoin('group', 'group.id', '=', 'participations.FK_GRP')
			    ->leftJoin('exer', 'exer.id', '=', 'participations.FK_EXER')
			    ->select('participations.*', 'exer.exer_name', 'group.group_name')
			    ->where('scout_name', 'LIKE', "%$search_string%")
			    ->orWhere('last_name', 'LIKE', "%$search_string%")
			    ->orWhere('first_name', 'LIKE', "%$search_string%")
			    ->orWhere('exer_name', 'LIKE', "%$search_string%")
			    ->orWhere('group_name', 'LIKE', "%$search_string%")->get();

		    $second = DB::table('participations')
			    ->leftJoin('group', 'group.id', '=', 'participations.FK_GRP')
			    ->leftJoin('exer', 'exer.id', '=', 'participations.FK_EXER')
			    ->select('participations.*', 'exer.exer_name', 'group.group_name')
			    ->where('scout_name', 'LIKE', "%$search_string%")
			    ->orWhere('last_name', 'LIKE', "%$search_string%")
			    ->orWhere('first_name', 'LIKE', "%$search_string%")
			    ->orWhere('exer_name', 'LIKE', "%$search_string%")
			    ->orWhere('group_name', 'LIKE', "%$search_string%")->get();
	    }

	    print_r($first);

        return view('success',['first' => $first,'second' => $second]);
    }
}
