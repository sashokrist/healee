<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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


    public function index()
    {
        if (auth()->user()->block_user === 0){
            Auth::logout();
            Session::flash('message', 'Your account is blocked!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/login');
        }
        return view('home');
    }
}
