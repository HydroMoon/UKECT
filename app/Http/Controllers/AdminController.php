<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reg;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }

    public function getUsers()
    {
        $users = new User;

        $users = User::all();


        return view('dashboard.users')->with(['data' => $users]);
    }

    public function getSingle($id)
    {
        $reg = new Reg;
        
        //$reg = Reg::where('user_id', '=', $id)->first()->scourses;
        $reg = Reg::all();
        var_dump($reg);
        //return view('dashboard.single')->with(['data' => $reg]);
    }

    public function getShortUser()
    {
        

        return view('dashboard.single-short');
    }

    public function getLongUser()
    {
        

        return view('dashboard.single-long');
    }
}
