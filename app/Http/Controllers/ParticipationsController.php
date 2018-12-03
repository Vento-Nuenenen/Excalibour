<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ParticipationsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index(Request $request)
    {
        if ($request->input('search') == null) {
            $participations = DB::table('participations')
                ->leftJoin('group', 'group.id', '=', 'participations.FK_GRP')
                ->leftJoin('exer', 'exer.id', '=', 'participations.FK_EXER')
<<<<<<< HEAD
                ->select('participations.*', 'exer.exer_name', 'group.name')->get();
=======
                ->select('participations.*', 'exer.exer_name', 'group.group_name')->get();
>>>>>>> release
        } else {
            $search_string = $request->input('search');

            $participations = DB::table('participations')
                ->leftJoin('group', 'group.id', '=', 'participations.FK_GRP')
                ->leftJoin('exer', 'exer.id', '=', 'participations.FK_EXER')
<<<<<<< HEAD
                ->select('participations.*', 'exer.exer_name', 'group.name')
=======
                ->select('participations.*', 'exer.exer_name', 'group.group_name')
>>>>>>> release
                ->where('scout_name', 'LIKE', "%$search_string%")
                ->orWhere('last_name', 'LIKE', "%$search_string%")
                ->orWhere('first_name', 'LIKE', "%$search_string%")
                ->orWhere('exer_name', 'LIKE', "%$search_string%")
<<<<<<< HEAD
                ->orWhere('name', 'LIKE', "%$search_string%")->get();
=======
                ->orWhere('group_name', 'LIKE', "%$search_string%")->get();
>>>>>>> release
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
<<<<<<< HEAD
        $groups = DB::table('group')->select('id', 'name')->get();
=======
        $groups = DB::table('group')->select('id', 'group_name')->get();
>>>>>>> release
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
<<<<<<< HEAD
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
=======
    }

    public function import(Request $request){
    	if($request->file('participations_list')){
		    $participations_list = $request->file('participations_list')->move(storage_path('temp/csv'),'participations.csv');
	    }else{
    		return redirect()->back()->with('error','Die Teilnehmer konnten nicht importiert werden, da keine entsprehende Datei gesendet wurde.');
	    }

	    $handle = fopen($participations_list, 'r');
    	$content = mb_convert_encoding(fread($handle,filesize($participations_list)),'UTF-8','Windows-1252');
    	$lines = preg_split("/(\n)/", $content);

    	$number_participations = count($lines);

    	unset($lines[$number_participations - 1]);

    	foreach($lines as $line){
    		$contents[] = explode(";",$line);
	    }

    	fclose($handle);

    	foreach($contents as $content){
    		$grp = DB::table('group')->select('id')->where('name','LIKE',"%$content[3]%")->first();

    		$content[4] = str_replace("\r",'',$content[4]);
		    $exer = DB::table('exer')->select('id','exer_name')->where('escaped_exer_name','LIKE',"%$content[4]%")->first();

    		DB::table('participations')->insert(['scout_name' => $content[0],'first_name' => $content[1],'last_name' => $content[2],'FK_GRP' => $grp->id,'FK_EXER' => $exer->id]);
	    }

        return redirect()->back()->with('message','Die TN wurden importiert!');
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $pid
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function edit($pid)
    {
        $participations = DB::table('participations')->where('id', '=', $pid)->first();
        $groups = DB::table('group')->select('group.id', 'group.group_name')->get();
>>>>>>> release
        $exer = DB::table('exer')->select('exer.id', 'exer.exer_name')->get();

        return view('participations.edit', ['participations' => $participations, 'groups' => $groups, 'exer' => $exer]);
    }

<<<<<<< HEAD
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $uid
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
=======
	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param                          $pid
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function update(Request $request, $pid)
>>>>>>> release
    {
        $scout_name = $request->input('scout_name');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $group = $request->input('group');
        $exer = $request->input('exer');

<<<<<<< HEAD
        DB::table('participations')->where('id', '=', $uid)->update(['scout_name' => $scout_name, 'first_name' => $first_name, 'last_name' => $last_name, 'FK_GRP' => $group, 'FK_EXER' => $exer]);
=======
        DB::table('participations')->where('id', '=', $pid)->update(['scout_name' => $scout_name, 'first_name' => $first_name, 'last_name' => $last_name, 'FK_GRP' => $group, 'FK_EXER' => $exer]);
>>>>>>> release

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
