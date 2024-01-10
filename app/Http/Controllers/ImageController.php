<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Collection;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        $image = new Image();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img', 'public');
            $image->image = $imagePath;
        }

        $image->save();

        return redirect()->route('collection.index')->with('success', 'Image ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->delete();

        return redirect()->route('collection.index')->with('success', 'Image supprimée avec succès !');
    }
}
