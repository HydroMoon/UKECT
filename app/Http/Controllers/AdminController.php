<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reg;
use App\Regs;
use App\Teacher;
use App\Message;
use App\Scourse;
use App\Lcourse;
use Session;

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

    public function getShortUser($id)
    {
        $short_reg = new Reg;

        $user = User::find($id);

        $short_reg = Reg::where('user_id', $id)->get();

        return view('dashboard.single-short')->with(['reg' => $short_reg, 'usern' => $user]);
    }

    public function getLongUser($id)
    {
        $long_reg = new Regs;

        $user = User::find($id);

        $long_reg = Regs::where('user_id', $id)->get();

        return view('dashboard.single-long')->with(['regs' => $long_reg, 'user' => $user]);
    }


    public function getTeacher()
    {
        $teach = new Teacher;

        $teach = Teacher::all();

        return view('dashboard.teacher')->with(['teacher' => $teach]);
    }

    public function storeTeacher(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'info' => 'required'
          ));
        
          $teach = new Teacher;

          $teach->name = $request->name;
          $teach->major = $request->major;
          $teach->level = $request->level;
          $teach->university = $request->university;
          $teach->info = $request->info;

          $teach->save();

          Session::flash('success', __('trans.add_teacher'));
  
          return redirect()->route('admin.teacher');
    }

    public function updateReg(Request $request, $id)
    {
        $reg = Reg::find($id);

        $reg->accepted = $request->acc;

        $reg->save();

        Session::flash('success', __('trans.reg'));
  
        return redirect()->route('users.single.short', $reg->user->id);
    }

    public function updateRegs(Request $request, $id)
    {

        $regs = Regs::find($id);

        $regs->accepted = $request->acc;

        $regs->save();

        Session::flash('success', __('trans.reg'));
  
        return redirect()->route('users.single.long', $regs->user->id);
    }

    public function getMessage()
    {
        $mess = new Message;
        $mess = Message::all();

        return view('dashboard.message')->with(['mess' => $mess]);
    }

    public function addUser()
    {
        return view('dashboard.register');
    }

    public function getShort($id)
    {
        $user = new User;
        $user = User::find($id);

        $short_courses = new Scourse;
        $short_courses = Scourse::all();

        return view('dashboard.add-short')->with(['user' => $user, 'shortc' => $short_courses]);
    }

    public function getLong($id)
    {
        $user = new User;
        $user = User::find($id);

        $long_courses = new Lcourse;
        $long_courses = Lcourse::all();

        return view('dashboard.add-long')->with(['user' => $user, 'longc' => $long_courses]);
    }


    public function storeShort(Request $request)
    {
         //Validate
         $this->validate($request, array(
            'name' => 'required|string|max:255',
            'dob' => 'required|date_format:Y-m-d',
            'nationality' => 'required|string',
            'phone' => 'required|numeric|min:10',
            'email' => 'required|string|email|max:255',
          ));

          //save info into database

          $user = User::find($request->userid);

          $reg = new Reg;
  
          $reg->name = $request->name;
          $reg->dob = $request->dob;
          $reg->sex = $request->sex;
          $reg->nationality = $request->nationality;
          $reg->phone = $request->phone;
          $reg->email = $request->email;

          $reg->scourse()->associate($request->scourse_id);
          $reg->user()->associate($user);
  
  
          $reg->save();
  
          Session::flash('success', __('trans.short_user_reg'));
  
          return redirect()->back();
    }

    public function storeLong(Request $request)
    {
        //Validate
         $this->validate($request, array(
            'name' => 'required|string|max:255',
            'dob' => 'required|date_format:Y-m-d',
            'nationality' => 'required|string',
            'phone' => 'required|numeric|min:10',
            'email' => 'required|string|email|max:255',
          ));

          //save info into database

          $user = User::find($request->userid);

          $reg = new Regs;
  
          $reg->name = $request->name;
          $reg->dob = $request->dob;
          $reg->sex = $request->sex;
          $reg->nationality = $request->nationality;
          $reg->phone = $request->phone;
          $reg->email = $request->email;
          
          $reg->lcourse()->associate($request->lcourse_id);
          $reg->user()->associate($user);
  
  
          $reg->save();
  
          Session::flash('success', __('trans.long_user_reg'));
  
          return redirect()->back();
    }
}
