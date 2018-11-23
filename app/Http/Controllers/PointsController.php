<?php

	namespace App\Http\Controllers;

	use DB;
	use Illuminate\Http\Request;

	class PointsController extends Controller{
		/**
		 * Display a listing of the resource.
		 *
		 * @param Request $request
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(Request $request)
		{
			$points = DB::table('points')->select('points.id','participations.scout_name','participations.first_name','participations.last_name','field.field_name','points.reached_points','group.group_name','MAX_POINTS')
				->join('participations','points.FK_PCP', '=', 'participations.id')
				->join('field','points.FK_FLD','=','field.id')
				->join('group', 'participations.FK_GRP', '=', 'group.id')->get();

			return view('points.points',['points' => $points]);
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return void
		 */
		public function create()
		{
			$participations = DB::table('participations')->get();
			$field = DB::table('field')->get();

			return view('points.add',['participations' => $participations, 'fields' => $field]);
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param \Illuminate\Http\Request $request
		 *
		 * @return void
		 */
		public function store(Request $request)
		{
			$participation = $request->input('participation');
			$field = $request->input('field');
			$points = $request->input('reached_points');

			DB::table('points')->insert(['FK_PCP' => $participation, 'FK_FLD' => $field, 'reached_points' => $points]);

			return redirect()->back()->with('message','Der Punktesatz wurde erfolgreich eingetragen!');
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param $fid
		 *
		 * @return void
		 */
		public function edit($fid)
		{
			//
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param \Illuminate\Http\Request $request
		 * @param                          $fid
		 *
		 * @return void
		 */
		public function update(Request $request, $fid)
		{
			//
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param $poid
		 *
		 * @return void
		 */
		public function destroy($poid)
		{
			DB::table('points')->where('id', '=', $poid)->delete();

			return redirect()->back()->with('message', 'Punktsatz wurde erfolgreich gelöscht.');
		}
	}