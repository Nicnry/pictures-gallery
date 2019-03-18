<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use App\Gallery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Kfirba\Directo\Support\Facades\Directo;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Gallery $gallery)
    {
        
        return redirect()->route('galleries.show', $gallery);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Gallery $gallery)
    {
        $directo = new Directo(env('AWS_BUCKET'), env('AWS_DEFAULT_REGION'), env('AWS_ACCESS_KEY_ID'), env('AWS_SECRET_ACCESS_KEY'), [
            'acl' => 'private',
        ]);
        return view('pictures.create')->with(compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Gallery $gallery, Request $request)
    {
        $picture = new Picture($request->all());
        $picture->gallery_id = $gallery->id;
        $picture->save();
        return redirect()->route('galleries.show', $gallery);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery, Picture $picture, Request $request)
    {
        if (Str::startsWith($request->header('accept'), 'image')) {
            /* return redirect()->file(Storage::disk('s3')->getAdapter()->getPathPrefix() . $picture->path); */
            return redirect(Storage::disk('s3')->temporaryUrl( $picture->path, Carbon::now()->addSeconds(2) ));
        } else {
            return view('pictures.show', compact('gallery', 'picture'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)
    {
        //
    }
}
