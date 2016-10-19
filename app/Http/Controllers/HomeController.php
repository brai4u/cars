<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->user_type == "admin"){
            return redirect('/cars/addcars/admin');
        }
        else if($user->user_type == "vendedor"){
            return redirect('/cars/addcars/vendedor');
        }
    }
   
}
