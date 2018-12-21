<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Image as IM;
use Session;
use Storage;

class ImageController extends Controller
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
        $image = new Image;
        $image = Image::where('cover', 1)->get();

        return view('dashboard.image')->with(['imgs' => $image]);
    }

    public function media()
    {
        $image = new Image;
        $image = Image::where('cover', 0)->get();

        return view('dashboard.mymedia')->with(['imgs' => $image]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, array(
            'img' => 'image',
            'cover' => 'numeric'
        ));

        $images = new Image;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('gallery/' . $filename);
            IM::make($image)->resize(750, 300)->save($location);
            $images->image = $filename;
            $images->cover = $request->cover;
          }

        $images->save();

        Session::flash('success', __('trans.img_cover'));

        return redirect()->back();
    }

    public function storeMedia(Request $request)
    {
        
        $this->validate($request, array(
            'img' => 'image',
            'cover' => 'numeric'
        ));

        $images = new Image;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('gallery/' . $filename);
            IM::make($image)->save($location);
            $images->image = $filename;
            $images->cover = $request->cover;
          }

        $images->save();

        Session::flash('success', __('trans.img_cover'));

        return redirect()->back();
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
        $image = Image::find($id);

        Storage::delete($image->image);

        $image->delete();

        Session::flash('success', __('trans.img_cover_delete'));

        return redirect()->back();
    }
}
