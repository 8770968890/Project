<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(count(Image::where('user_id', auth()->user()->id)->get())==0){
            $first_image_type=0;
            return view('admin.image.index', compact('first_image_type'));
        }
        $potrait_images=Image::where('type', 2)->where('user_id', auth()->user()->id)->get();
        $landscape_images=Image::where('type', 1)->where('user_id', auth()->user()->id)->get();
        $first_image_type=Image::where('user_id', auth()->user()->id)->first()->type;
        return view('admin.image.index', compact('potrait_images', 'landscape_images', 'first_image_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.image.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'image' => ['required'],
        ])->validate();

        
        if ($request->has('image')) {
            $image_path = $request->file('image')->store('image', 'public');
        }

        $image_model=new Image();
        $image_model->type=$request->type;
        $image_model->image=$image_path;
        $image_model->user_id=auth()->user()->id;
        $image_model->save();

        return redirect()->route('image.index')->with('success', 'New Image Added Successfully!');
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
