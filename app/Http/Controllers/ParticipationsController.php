<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ParticipationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->input('search') == null) {
            $participations = DB::table('participations')
                ->leftJoin('group', 'group.id', '=', 'participations.FK_GRP')
                ->leftJoin('exer', 'exer.id', '=', 'participations.FK_EXER')
                ->select('participations.*', 'exer.exer_name', 'group.name')->get();
        } else {
            $search_string = $request->input('search');

            $participations = DB::table('participations')
                ->leftJoin('group', 'group.id', '=', 'participations.FK_GRP')
                ->leftJoin('exer', 'exer.id', '=', 'participations.FK_EXER')
                ->select('participations.*', 'exer.exer_name', 'group.name')
                ->where('scout_name', 'LIKE', "%$search_string%")
                ->orWhere('last_name', 'LIKE', "%$search_string%")
                ->orWhere('first_name', 'LIKE', "%$search_string%")
                ->orWhere('exer_name', 'LIKE', "%$search_string%")
                ->orWhere('name', 'LIKE', "%$search_string%")->get();
        }

        return view('participations.participations', ['participations' => $participations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = DB::table('group')->select('id', 'name')->get();
        $exer = DB::table('exer')->select('id', 'exer_name')->get();

        return view('participations.add', ['groups' => $groups, 'exer' => $exer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $scout_name = $request->input('scout_name');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $group = $request->input('group');
        $exer = $request->input('exer');

        DB::table('participations')->insert(['scout_name' => $scout_name, 'first_name' => $first_name, 'last_name' => $last_name, 'FK_GRP' => $group, 'FK_EXER' => $exer]);

        return redirect()->back()->with('message', 'Teilnehmer wurde erstellt.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $uid
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        $participations = DB::table('participations')->where('id', '=', $uid)->first();
        $groups = DB::table('group')->select('group.id', 'group.name')->get();
        $exer = DB::table('exer')->select('exer.id', 'exer.exer_name')->get();

        return view('participations.edit', ['participations' => $participations, 'groups' => $groups, 'exer' => $exer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $uid
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        $scout_name = $request->input('scout_name');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $group = $request->input('group');
        $exer = $request->input('exer');

        DB::table('participations')->where('id', '=', $uid)->update(['scout_name' => $scout_name, 'first_name' => $first_name, 'last_name' => $last_name, 'FK_GRP' => $group, 'FK_EXER' => $exer]);

        return redirect()->back()->with('message', 'Teilnehmer wurde aktualisiert.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $uid
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        DB::table('participations')->where('id', '=', $uid)->delete();

        return redirect()->back()->with('message', 'Teilnehmer erfolgreich gelöscht.');
    }
}
