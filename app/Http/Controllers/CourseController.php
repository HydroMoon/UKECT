<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reg;
use App\Lcourse;
use App\Scourse;
use App\Teacher;
use Session;

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

        $short = new Scourse;
        $long = new Lcourse;
        $teacher = new Teacher;

        $short = Scourse::all();
        $long = Lcourse::all();
        $teacher = Teacher::all();

        return view('dashboard.courses')->with(['short' => $short, 'long' => $long, 'teacher' => $teacher]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeShort(Request $request)
    {

        //Validate
        $this->validate($request, array(
            'cname' => 'required|string|max:255',
            'price' => 'required|numeric',
            'teacher' => 'required|string',
            'certificate' => 'required|string',
            'start' => 'required|date_format:Y-m-d',
            'finish' => 'required|date_format:Y-m-d',
            'info' => 'required',
          ));

        $shortc = new Scourse;

        $shortc->cname = $request->cname;
        $shortc->price = $request->price;
        $shortc->teacher = $request->teacher;
        $shortc->certificate = $request->certificate;
        $shortc->info = $request->info;
        $shortc->start = $request->start;
        $shortc->finish = $request->finish;

        $shortc->save();

        Session::flash('success', __('trans.shortc_success'));

        return redirect()->route('admin.courses');
    }

    public function storeLong(Request $request)
    {
       
        //Validate
        $this->validate($request, array(
            'cname' => 'required|string|max:255',
            'ctype' => 'required|string|max:255',
            'price' => 'required|numeric',
            'teacher' => 'required|string',
            'certificate' => 'required|string',
            'start' => 'required|date_format:Y-m-d',
            'finish' => 'required|date_format:Y-m-d',
            'info' => 'required',
          ));

        $longc = new Lcourse;

        $longc->cname = $request->cname;
        $longc->ctype = $request->ctype;
        $longc->price = $request->price;
        $longc->teacher = $request->teacher;
        $longc->certificate = $request->certificate;
        $longc->info = $request->info;
        $longc->start = $request->start;
        $longc->finish = $request->finish;

        $longc->save();

        Session::flash('success', __('trans.longc_success'));

        return redirect()->route('admin.courses');
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
    public function editShort($id)
    {
        $teacher = new Teacher;
        $teacher = Teacher::all();

        $short = Scourse::find($id);

        return view('dashboard.edit-s')->with(['short' => $short, 'teacher' => $teacher]);
    }

    public function editLong($id)
    {
        $teacher = new Teacher;
        $teacher = Teacher::all();

        $long = Lcourse::find($id);

        return view('dashboard.edit-l')->with(['long' => $long, 'teacher' => $teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateShort(Request $request, $id)
    {
        $shortc = Scourse::find($id);

        //Validate
        $this->validate($request, array(
            'cname' => 'required|string|max:255',
            'price' => 'required|numeric',
            'teacher' => 'required|string',
            'certificate' => 'required|string',
            'start' => 'required|date_format:Y-m-d',
            'finish' => 'required|date_format:Y-m-d',
            'info' => 'required',
          ));

        $shortc = new Scourse;

        $shortc->cname = $request->cname;
        $shortc->price = $request->price;
        $shortc->teacher = $request->teacher;
        $shortc->certificate = $request->certificate;
        $shortc->duration = $request->duration;
        $shortc->info = $request->info;
        $shortc->start = $request->start;
        $shortc->finish = $request->finish;

        $shortc->save();

        Session::flash('success', __('trans.course_edit'));

        return redirect()->route('admin.courses');
    }

    public function updateLong(Request $request, $id)
    {
        $longc = Lcourse::find($id);

        //Validate
        $this->validate($request, array(
            'cname' => 'required|string|max:255',
            'ctype' => 'required|string|max:255',
            'price' => 'required|numeric',
            'teacher' => 'required|string',
            'certificate' => 'required|string',
            'start' => 'required|date_format:Y-m-d',
            'finish' => 'required|date_format:Y-m-d',
            'info' => 'required',
          ));

        $longc->cname = $request->cname;
        $longc->ctype = $request->ctype;
        $longc->price = $request->price;
        $longc->teacher = $request->teacher;
        $longc->certificate = $request->certificate;
        $longc->duration = $request->duration;
        $longc->info = $request->info;
        $longc->start = $request->start;
        $longc->finish = $request->finish;

        $longc->save();

        Session::flash('success', __('trans.course_edit'));

        return redirect()->route('admin.courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyShort($id)
    {
        $course = Scourse::find($id);
        
        $course->delete();

        Session::flash('success', __('trans.course_deleted'));

        return redirect()->route('admin.courses');
    }

    public function destroyLong($id)
    {
        $course = Lcourse::find($id);
        
        $course->delete();

        Session::flash('success', __('trans.course_deleted'));

        return redirect()->route('admin.courses');
    }
    
}
