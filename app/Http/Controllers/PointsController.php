<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;

class PointsController extends Controller
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
        $setPoints = DB::select('SELECT *, p2u.id as p2u_id FROM users LEFT  JOIN p2u ON users.id = p2u.fk_users LEFT JOIN posten ON p2u.fk_posten = posten.id WHERE reached_points;');

        $groups = DB::select('SELECT * FROM posten;');

        $users = DB::select('SELECT users.id, users.first_name, users.scoutname, users.last_name FROM users LEFT JOIN role_user ON users.id = role_user.user_id LEFT JOIN roles ON role_user.role_id = roles.id WHERE name != "admin" AND name != "User";');

        return view('user.points')->with(['setPoints' => $setPoints, 'groups' => $groups, 'users' => $users]);
    }

    public function add(Request $request)
    {
        DB::insert("INSERT INTO p2u(`fk_users`,`fk_posten`,`reached_points`) VALUES('$request->users','$request->posten','$request->reached_points')");

        return redirect()->back()->with('success', 'Punkte wurden hinzugefügt!');
    }

    public function delete(Request $request)
    {
        DB::delete("DELETE FROM p2u WHERE id = $request->point_id;");

        return redirect()->back()->with('success', 'Punkte wurden Gelöscht!');
    }
}
