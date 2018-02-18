<?php

namespace App\Http\Controllers;

use App\converter;
use DB;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function manage()
    {
        $groups = DB::select('SELECT * FROM posten;');

        $groups = Converter::to_array($groups);

        return view('group.group')->with(['groups' => $groups]);
    }

    public function add(Request $request)
    {
        $new_group = $request->new_group;
        $max_points = $request->max_points;

        DB::insert("INSERT INTO posten(`posten_name`, `max_points`) VALUES('$new_group', '$max_points')");

        return redirect()->back()->with('success', 'Eine Gruppe wurde hinzufügen!');
    }
}
