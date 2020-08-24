<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        $points = DB::table('points')->select('points.id', 'participations.scout_name', 'participations.first_name', 'participations.last_name', 'field.field_name', 'points.reached_points', 'group.group_name', 'MAX_POINTS')
            ->join('participations', 'points.FK_PCP', '=', 'participations.id')
            ->join('field', 'points.FK_FLD', '=', 'field.id')
            ->join('group', 'participations.FK_GRP', '=', 'group.id')->get();

        return view('points.points', ['points' => $points]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|void
     */
    public function create()
    {
        $participations = DB::table('participations')->get();
        $field = DB::table('field')->get();

        return view('points.add', ['participations' => $participations, 'fields' => $field]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $participation = $request->input('participation');
        $field = $request->input('field');
        $points = $request->input('reached_points');

        DB::table('points')->insert(['FK_PCP' => $participation, 'FK_FLD' => $field, 'reached_points' => $points]);

        return redirect()->back()->with('message', 'Der Punktesatz wurde erfolgreich eingetragen!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $poid
     *
     * @return Application|Factory|View|void
     */
    public function edit($poid)
    {
        $points = DB::table('points')->where('id', '=', $poid)->first();
        $participations = DB::table('participations')->get();
        $field = DB::table('field')->get();

        return view('points.edit', ['points' => $points, 'participations' => $participations, 'fields' => $field]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $poid
     *
     * @return RedirectResponse
     */
    public function update(Request $request, $poid)
    {
        $participation = $request->input('participation');
        $field = $request->input('field');
        $reached_points = $request->input('reached_points');

        $max_points = DB::table('field')->select('max_points')->where('id', '=', $field)->first();

        if ($reached_points <= $max_points->max_points) {
            DB::table('points')->where('id', '=', $poid)->update(['reached_points' => $reached_points, 'FK_PCP' => $participation, 'FK_FLD' => $field]);

            return redirect()->back()->with('message', 'Der Punktestand wurde aktualisiert!');
        } else {
            return redirect()->back()->with('error', 'Der Punktestand ist höher als die mögliche Punktzahl!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $poid
     *
     * @return RedirectResponse
     */
    public function destroy($poid)
    {
        DB::table('points')->where('id', '=', $poid)->delete();

        return redirect()->back()->with('message', 'Punktsatz wurde erfolgreich gelöscht.');
    }
}
