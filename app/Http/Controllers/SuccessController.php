<?php

namespace App\Http\Controllers;

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
        $max_points = DB::table('field')->select('MAX_POINTS')->get();
        $max_points = $max_points->sum('MAX_POINTS');

        $fields = DB::table('field')->select('field_name')->get();
        $fields_number = count($fields);

        if ($request->input('search') == null) {
            $first = DB::select('select participations.*, exer.id as exerid, GROUP_CONCAT(field.field_name) as fields,
       									GROUP_CONCAT(field.MAX_POINTS) as maxpoints, group.group_name,
       									GROUP_CONCAT(points.reached_points) as points from `participations`
  										left join `exer` on `exer`.`id` = `participations`.`FK_EXER`
  										left join `group` on `group`.`id` = `participations`.`FK_GRP`
  										left join `points` on `points`.`FK_PCP` = `participations`.`id`
  										left join `field` on `field`.`id` = `points`.`FK_FLD`
  										where `exer`.`id` = 1;');

            $second = DB::select('select participations.*, exer.id as exerid, GROUP_CONCAT(field.field_name) as fields,
       									GROUP_CONCAT(field.MAX_POINTS) as maxpoints, group.group_name,
       									GROUP_CONCAT(points.reached_points) as points from `participations`
  										left join `exer` on `exer`.`id` = `participations`.`FK_EXER`
  										left join `group` on `group`.`id` = `participations`.`FK_GRP`
  										left join `points` on `points`.`FK_PCP` = `participations`.`id`
  										left join `field` on `field`.`id` = `points`.`FK_FLD`
  										where `exer`.`id` = 2;');
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

        foreach ($first as $value) {
            $value->fields = explode(',', $value->fields);
            $value->maxpoints = explode(',', $value->maxpoints);
            $value->points = explode(',', $value->points);
            $value->reached_points = array_sum($value->points);
        }

        foreach ($second as $value) {
            $value->fields = explode(',', $value->fields);
            $value->maxpoints = explode(',', $value->maxpoints);
            $value->points = explode(',', $value->points);
            $value->reached_points = array_sum($value->points);
        }

        return view('success', ['first' => $first, 'second' => $second, 'max_points' => $max_points, 'fields_number' => $fields_number]);
    }
}
