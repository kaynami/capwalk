<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media = \App\Media::paginate(10);
        return view('admin.media', compact('media'));
    }

    public function upload(Request $request)
    {
        $file = $request->file('media');
        $originalName = $file->getClientOriginalName();
        $size = $file->getSize();
        $type = $file->getClientMimeType();

        $upload = $request->file('media')->storeAs('medias', $originalName);

        Media::query()->where('path', $upload)->delete();

        $media = new Media;
        $media->path = $upload;
        $media->type = $type;
        $media->format = $type;
        $media->size = $size;
        $media->save();

        return redirect('/admin/media');
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
        //
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
        $media = Media::find($id);

        Storage::delete($media->path);
        Media::destroy($id);

        return redirect('/admin/media');
    }
}
