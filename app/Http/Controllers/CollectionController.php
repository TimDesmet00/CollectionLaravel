<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Image;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('collection.index', ['collections' => Collection::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres=Genre::all();
        // dd($genres);
        return view('collection.create', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'shortname' => 'required|string|max:50|unique:collections',
            'fullname' => 'required|string|max:255',
            'image_id' => 'nullable|integer',
            'year'=> 'required|integer',
            'description' => 'required',
            'link' => 'nullable|string'
        ]);

        $collection = new Collection();

        $collection->shortname = $request->shortname;
        $collection->fullname = $request->fullname;
        $collection->slug = $request->shortname;
        if ($request->has('image_id')) {
            $image = Image::find($request->image_id);
            if ($image) {
                $collection->image()->associate($image);
            } else {
                // Handle the case where the image does not exist
            }
        }
        if ($request->has('genres')) {
            foreach ($request->genres as $genre_id) {
                $genre = Genre::find($genre_id);
                if ($genre) {
                    $collection->genres()->attach($genre);
                }
            }
        }
        $collection->user_id = Auth::id();
        $collection->year = $request->year;
        $collection->description = $request->description;
        $collection->link = $request->link;

        // $collection->save();
        try {
            $collection->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return redirect()->route('collection.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('collection.show', ['collection' => Collection::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = Collection::findOrFail($id);
        $genres = Genre::all();

        return view('collection.edit', ['collection' => $collection, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        $this->validate($request, [
            'shortname' => 'required|string|max:50',
            'fullname' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:collections',
            'image_id' => 'nullable|integer',
            'user_id' => 'required|integer',
            'year'=> 'required|integer',
            'description' => 'required',
            'link' => 'nullable|string'
        ]);

        $collection->shortname = $request->shortname;
        $collection->fullname = $request->fullname;
        $collection->slug = $request->shortname;
        if ($request->has('image_id')) {
            $image = Image::find($request->image_id);
            if ($image) {
                $collection->image()->associate($image);
            } else {
                // Handle the case where the image does not exist
            }
        }
        $collection->user_id = auth::id();
        $collection->year = $request->year;
        $collection->description = $request->description;
        $collection->link = $request->link;

        $collection->save();

        return redirect()->route('collection.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();

        return redirect()->route('collection.index');
    }
}
