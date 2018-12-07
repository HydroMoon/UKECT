<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Reg;
use App\Regs;
use App\User;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        return view('user.dash');
    }

    public function getShort()
    {
        return view('user.short-course-regestration');
    }

    public function getLong()
    {
        $user = new User;
        $user = User::find(Auth::user()->id);

        return view('user.long-course-regestration')->withUser($user);
    }

    public function storeShort(Request $request)
    {
         //Validate
        //  $this->validate($request, array(
        //     'title' => 'required|max:255',
        //     'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
        //     'body' => 'required',
        //     'front_image' => 'sometimes|image'
        //   ));

          //save info into database

          $user = User::find(Auth::user()->id);

          $reg = new Reg;
  
          $reg->name = $request->name;
          $reg->dob = $request->dob;
          $reg->sex = $request->sex;
          $reg->nationality = $request->nationality;
          $reg->phone = $request->phone;
          $reg->email = $request->email;

          $reg->scourses()->associate($request->scourse_id);
          $reg->user()->associate($user);
  
  
          $reg->save();
  
          Session::flash('success', 'Course registered successfuly');
  
          return redirect()->route('user.dash');
    }

    public function storeLong(Request $request)
    {
         //Validate
        //  $this->validate($request, array(
        //     'title' => 'required|max:255',
        //     'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
        //     'body' => 'required',
        //     'front_image' => 'sometimes|image'
        //   ));

          //save info into database

          $user = User::find(Auth::user()->id);

          $reg = new Regs;
  
          $reg->name = $request->name;
          $reg->dob = $request->dob;
          $reg->sex = $request->sex;
          $reg->nationality = $request->nationality;
          $reg->phone = $request->phone;
          $reg->email = $request->email;
          
          $reg->lcourses()->associate($request->lcourse_id);
          $reg->user()->associate($user);
  
  
          $reg->save();
  
          Session::flash('success', 'Course registered successfuly');
  
          return redirect()->route('user.dash');
    }
}
