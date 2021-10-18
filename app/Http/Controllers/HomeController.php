<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home');
        $role = Auth::user()->role;
        $checkrole = explode(',', $role);
        if (in_array('admin', $checkrole)) {
            return redirect('dashboard');
        } else {
            return redirect('compdec/index');
        }
    }
}
