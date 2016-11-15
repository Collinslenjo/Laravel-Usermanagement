<?php

namespace App\Http\Controllers;
use \Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function isAdmin()
    {
         return $this->hasRole('admin');
        //return $this->admin; // this looks for an admin column in your users table
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function admin()
    {
        //$this->middleware('admin');
        return view('managers.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
