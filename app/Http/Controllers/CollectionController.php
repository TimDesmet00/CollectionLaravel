<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Image;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
            'shortname' => [
                'required',
                'string',
                'max:50',
                Rule::unique('collections'),
            ],
            'fullname' => 'required|string|max:255',
            'image_id' => 'nullable|integer',
            'genres' => 'nullable|array',
            'year'=> 'required|integer',
            'description' => 'required',
            'link' => 'nullable|string'
        ]);

        $collection = new Collection();

        $collection->shortname = $request->shortname;
        $collection->fullname = $request->fullname;
        $collection->slug = $request->shortname;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = storage_path('app/public/img/' . $filename);
            $image->move(storage_path('app/public/img/'), $filename);
        
            $savedImage = Image::create(['name' => $filename]);
            $collection->image()->associate($savedImage);
        }

        $collection->user_id = Auth::id();
        $collection->year = $request->year;
        $collection->description = $request->description;
        $collection->link = $request->link;

        $collection->save();

        if ($request->has('genres')) {
            $genre_ids = array_map('intval', $request->genres);
            $collection->genres()->sync($genre_ids);
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
            'shortname' => [
                'required',
                'string',
                'max:50',
                Rule::unique('collections')->ignore($collection->id),
            ],
            'fullname' => 'required|string|max:255',
            'image_id' => 'nullable|integer',
            'genres' => 'nullable|array',
            'year'=> 'required|integer',
            'description' => 'required',
            'link' => 'nullable|string'
        ]);

        // dd(request()->all());

        $collection->shortname = $request->shortname;
        $collection->fullname = $request->fullname;
        $collection->slug = $request->shortname;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = storage_path('app/public/img/' . $filename);
            $image->move(storage_path('app/public/img/'), $filename);
        
            $savedImage = Image::create(['name' => $filename]);
            $collection->image()->associate($savedImage);
        }

        if ($request->has('genres')) {
            $genre_ids = array_map('intval', $request->genres);
            $collection->genres()->sync($genre_ids);
        }

        $collection->user_id = Auth::id();
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
