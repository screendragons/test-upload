<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Upload;
use File;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {

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
        // echo $request->file('img')
        // ->storeAs('image');
        // $request->validate($request, [
        //     'file' => 'required|file|max:1999'
        // ]);
        // Storage::put('public/storage', $fileContents);
        // $file = $request->input('file');

        // $path = $request->file('file')->store(
        //     'files', 'public'
        // );

        // $request->file->store('files');
        // $request->file->storeAs('uploads', $request->file->getClientOriginalName());
        // return redirect('test');

        // $this->validate($request, [
        //     'file'=>'required',
        // ]);

        // $uploads = auth()->user()->uploads()->create($request->all());



        $upload = new Upload();
        $upload->name = $request->input('name');
        $upload->file = $request->input('file');

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $file->move('/app/public/'.$filename);
            $public->image = $filename;
        }



        // oude code van project
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'file' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('file')){
            // dd('here');
            // Get file name with extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file')->getClientOriginalName();
            // Filename to store
            $fileNameToStore = str_slug($filename.'_'.time()).'.'.$extension;
            // Upload Image
            Image::make($request->file('file'))
                ->resize(600, 300, function($constraint){
                    $constraint->aspectRatio();
                })
                ->save(storage_path('app\\public\\'.$fileNameToStore));
                // ->storeAs('public', $fileNameToStore);
            // $path = $request->file('file')->storeAs('public', $fileNameToStore);
            // $image = $request->file('file');
            // $imageName = $image->getClientOriginalName();
            // $image->move(public_path('images'),$filenameWithExt);
        } else {
            $fileNameToStore = 'no_image.jpg';
        }

        $upload = new Upload();
        $upload->user_id = Auth::id();
        $upload->name = $request->title;
        $upload->filename = $fileNameToStore;
        $upload->description = $request->body;
        $upload->media_type = '';
        $upload->datasize = 1;
        $upload->save();

        // dd($upload);

        // return redirect()->back();
         return redirect('home');
            // ->with('uploads', $upload);

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
