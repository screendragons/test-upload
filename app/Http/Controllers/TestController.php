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


        // $upload = new Upload();
        // $upload->name = $request->input('name');
        // $upload->file = $request->input('file');

        // if($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalName();
        //     $file->move('/app/public/'.$filename);
        //     $public->image = $filename;
        // }

        $file = $request->file('image')->storeAs(
            'images', $request->user()->id
        );
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
