<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Image;
use Storage;
use Purifier;

class PostController extends Controller
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
    public function index()
    {
      $posts = Post::orderBy('id', 'desc')->paginate(10);
      return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $this->validate($request, array(
          'title' => 'required|max:255',
          'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
          'body' => 'required',
          'front_image' => 'sometimes|image'
        ));
        //save info into database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = Purifier::clean($request->body);
        $post->uname = $request->uname;

        if ($request->hasFile('front_image')) {
          $image = $request->file('front_image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(750, 300)->save($location);

          $post->image = $filename;
        }

        $post->save();

        Session::flash('success', __('trans.post_add'));

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::find($id);
      return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::find($id);
      return view('posts.edit')->withPost($post);
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
      // Validate the data
      $post = Post::find($id);

      if ($request->slug == $post->slug) {
          $this->validate($request, array(
              'title' => 'required|max:255',
              'body'  => 'required',
              'front_image' => 'sometimes|image'
          ));
      } else {
      $this->validate($request, array(
              'title' => 'required|max:255',
              'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
              'body'  => 'required',
              'front_image' => 'sometimes|image'
          ));
      }

      // Save the data to the database
      $post = Post::find($id);

      $post->title = $request->title;
      $post->slug = $request->slug;
      $post->body = Purifier::clean($request->body);

      if ($request->hasFile('front_image')) {
        $image = $request->file('front_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(750, 300)->save($location);

        $oldfilename = $post->image;

        $post->image = $filename;

        Storage::delete($oldfilename);

      }

      $post->save();

      // set flash data with success message
      Session::flash('success', __('trans.post_edit'));

      // redirect with flash data to posts.show
      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);

      Storage::delete($post->image);

      $post->delete();

      Session::flash('success', __('trans.post_delete'));
      return redirect()->route('posts.index');
    }
}
