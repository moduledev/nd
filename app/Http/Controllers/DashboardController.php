<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display main dashboard page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.dashboard.index', compact('user'));
    }

    /**
     * Display admins page
     *
     * @return \Illuminate\Http\Response
     */
    public function admins()
    {
        if (Auth::user()->hasPermissionTo('admin-list')) {
            $admins = Admin::all();
            return view('admin.admin.index', compact('admins'));
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }

    }

    /**
     * Display roles page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function roles()
    {
        if (Auth::user()->hasPermissionTo('role-list')) {
            $roles = Role::paginate(5);
            return view('admin.role.index', compact('roles'));
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

}
