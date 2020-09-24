<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File; 

use App\Image;

use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('upload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->has('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();
            $size = $request->file('image')->getSize();
            $path = $request->file('image')->store('images','public');

            Image::create([
                'name' => $name,
                'extension' => $extension,
                'size' => $size,
                'path' => $path,
            ]);
        }
        return redirect('upload');
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
        $images = Image::find($id);
        return view('changeimage')->with('images',$images);
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
        // $images = Image::find($id);

        if ($request->has('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();
            $size = $request->file('image')->getSize();
            $path = $request->file('image')->store('images','public');


            Image::where('id',$id)->update([
                'name' => $name,
                'extension' => $extension,
                'size' => $size,
                'path' => $path,
            ]);
        }
        return redirect('upload');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Image::find($id);
        File::delete('storage/'.$del->path);
        $del->delete();
        return redirect('upload');
    }
}
