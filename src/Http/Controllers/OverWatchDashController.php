<?php

namespace Tallmancode\OverWatch\Http\Controllers;

use Illuminate\Http\Request;

class OverWatchDashController extends Controller
{
    public function index(){
        return view('OverWatch::dashboard.dashboard');
    }

    public function logout()
    {
        app('OverWatchAuth')->logout();

        return redirect()->route('overwatch.login');
    }
}
