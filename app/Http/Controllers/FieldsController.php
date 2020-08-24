<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class FieldsController extends Controller
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
        if ($request->input('search') == null) {
            $fields = DB::table('field')->get();
        } else {
            $search_string = $request->input('search');

            $fields = DB::table('field')
                ->where('field_name', 'LIKE', "%$search_string%")
                ->orWhere('field_description', 'LIKE', "%$search_string%")->get();
        }

        return view('fields.fields', ['fields' => $fields]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('fields.add');
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
        $field_name = $request->input('field_name');
        $field_description = $request->input('field_description');
        $field_points = $request->input('field_points');

        DB::table('field')->insert(['name' => $field_name, 'description' => $field_description, 'MAX_POINTS' => $field_points]);

        return redirect()->back()->with('message', 'Posten wurde erstellt.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $fid
     *
     * @return Application|Factory|Response|View
     */
    public function edit($fid)
    {
        $fields = DB::table('field')->where('id', '=', $fid)->first();

        return view('fields.edit', ['fields' => $fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param                          $fid
     *
     * @return RedirectResponse
     */
    public function update(Request $request, $fid)
    {
        $field_name = $request->input('field_name');
        $field_description = $request->input('field_description');
        $field_points = $request->input('field_points');

        DB::table('field')->where('id', '=', $fid)->update(['name' => $field_name, 'description' => $field_description, 'MAX_POINTS' => $field_points]);

        return redirect()->back()->with('message', 'Posten wurde aktualisiert.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $fid
     *
     * @return RedirectResponse
     */
    public function destroy($fid)
    {
        DB::table('field')->where('id', '=', $fid)->delete();

        return redirect()->back()->with('message', 'Posten erfolgreich gelöscht.');
    }
}
