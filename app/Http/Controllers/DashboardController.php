<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        // $users = User::all()->count();
        // $programs = Program::all()->count();
        return view('dashboard.index');
    }

}
