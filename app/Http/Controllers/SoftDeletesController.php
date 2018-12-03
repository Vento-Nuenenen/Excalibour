<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;

class SoftDeletesController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get Soft Deleted User.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function getDeletedUser($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->get();
        if (count($user) != 1) {
            return redirect('/users/deleted/')->with('error', trans('usersmanagement.errorUserNotFound'));
        }

        return $user[0];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::onlyTrashed()->get();
        $roles = Role::all();

        return View('usersmanagement.show-deleted-users', compact('users', 'roles'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = self::getDeletedUser($id);

        return view('usersmanagement.show-deleted-user')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user = self::getDeletedUser($id);
        $user->restore();

        return redirect('/users/')->with('success', trans('usersmanagement.successRestore'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = self::getDeletedUser($id);
        $user->forceDelete();

        return redirect('/users/deleted/')->with('success', trans('usersmanagement.successDestroy'));
    }
}
