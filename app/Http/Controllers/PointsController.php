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
			$points = DB::table('points')
				->join('participations','points.FK_PCP', '=', 'participations.id')
				->join('field','points.FK_FLD','=','field.id')
				->join('group', 'participations.FK_GRP', '=', 'group.id')->get();
			
			print_r($points);

			return view('points.points');
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
			//
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
		 * @param $fid
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function destroy($fid)
		{
			//
		}
	}