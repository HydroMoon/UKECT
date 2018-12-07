<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Scourse;
use App\Reg;
use App\Lcourse;
use App\Scourse;

class CourseController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {

        return view('dashboard.short-courses');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createShort()
    {
        $short = new Scourse;

        $short = Scourse::all();

        return view('dashboard.short-courses')->with(['data' => $short]);
    }

    public function createLong()
    {

        $long = new Lcourse;

        $long = Lcourse::all();        

        return view('dashboard.long-courses')->with(['data' => $long]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeShort(Request $request)
    {
       
    }

    public function storeLong(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
