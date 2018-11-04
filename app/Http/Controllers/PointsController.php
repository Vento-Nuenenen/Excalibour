<?php

	namespace App\Http\Controllers;

	use DB;
	use Illuminate\Http\Request;

	class PointsController extends Controller{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(Request $request)
		{
			$points = DB::table('points')->leftJoin('participations','participations.id', '=', 'points.FK_PCP')->get();
			
			print_r($points);

			return view('points.points');
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
			//
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
			//
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param $fid
		 *
		 * @return \Illuminate\Http\Response
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
		 * @return \Illuminate\Http\Response
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