<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reg;
use App\Lcourse;
use App\Scourse;
use App\Specialty;
use App\Course;
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
        $long = Specialty::all();
        $teacher = Teacher::all();

        return view('dashboard.courses')->with(['long' => $long]);
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
            'spec_name' => 'required|string|max:255',
            'spec_type' => 'required|string|max:255',
            'duration' => 'required',
            'info' => 'required',
        ));

        $specialty = new Specialty;

        $specialty->spec_name = $request->spec_name;
        $specialty->spec_type = $request->spec_type;
        $specialty->duration = $request->duration;
        $specialty->info = $request->info;

        $specialty->save();

        Session::flash('success', __('trans.longc_success'));

        return redirect()->route('admin.courses');
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
        $long = Specialty::find($id);

        return view('dashboard.edit-l')->with(['long' => $long]);
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
        $shortc->info = $request->info;
        $shortc->start = $request->start;
        $shortc->finish = $request->finish;

        $shortc->save();

        Session::flash('success', __('trans.course_edit'));

        return redirect()->route('admin.courses');
    }

    public function updateLong(Request $request, $id)
    {
        $longc = Specialty::find($id);

        //Validate
        $this->validate($request, array(
            'spec_name' => 'required|string|max:255',
            'spec_type' => 'required|string|max:255',
            'duration' => 'required',
            'info' => 'required',
        ));

        $longc->spec_name = $request->spec_name;
        $longc->spec_type = $request->spec_type;
        $longc->duration = $request->duration;
        $longc->info = $request->info;

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
