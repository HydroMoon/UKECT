<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Admin;
use App\Image;
use App\Scourse;
use App\Lcourse;
use App\Message;
use Session;

class BlogController extends Controller
{
    public function getIndex() {
      $posts = Post::orderBy('id', 'desc')->paginate(5);
      
      $image = new Image;
      $image = Image::where('cover', 0)->get();


  		return view('blog.index')->with(['posts' => $posts, 'imgs' => $image]);
  	}

    public function getSingle($slug)
    {
      $post = Post::where('slug', '=', $slug)->first();

      $image = new Image;
      $image = Image::where('cover', 0)->get();

      return view('blog.single')->with(['post' => $post, 'imgs' => $image]);
    }

    public function getEmployee()
    {
      $admin = new Admin;
      $admin = Admin::all();

      return view('main.about')->withAdmin($admin);
    }

    public function getMain()
    {
      $images = new Image;
      $images = Image::where('cover', 1)->get();

      return view('main.index')->with(['imgs' => $images]);
    }

    public function getShort()
    {
      $short = new Scourse;
      $short = Scourse::all();

      return view('courses.short')->withShort($short);
    }

    public function getLong()
    {
      $long = new Lcourse;
      $long = Lcourse::all();

      return view('courses.long')->withLong($long);
    }

    public function saveMessage(Request $request)
    {
      
      //Validate
      $this->validate($request, array(
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
      ));

      $mess = new Message;

      $mess->name = $request->name;
      $mess->email = $request->email;
      $mess->message = $request->message;

      $mess->save();

      Session::flash('success', __('trans.message'));

      return redirect()->route('contact');
    }

    public function getMedia()
    {
      $image = new Image;
      $image = Image::where('cover', 0)->get();
      
      return view('main.media')->with(['imgs' => $image]);
    }
}
