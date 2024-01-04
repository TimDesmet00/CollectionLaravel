<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

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
        return view('collection.create');
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
            'shortname' => 'required|string|max:50',
            'fullname' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'firstgender'=> 'required|string',
            'secondgender'=> 'nullable|string',
            'thirdgender'=> 'nullable|string',
            'year'=> 'required|integer',
            'description' => 'required',
            'link' => 'required'
        ]);

        $collection = new Collection();

        $collection->shortname = $request->shortname;
        $collection->fullname = $request->fullname;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img', 'public');
            $collection->image = $imagePath;
        }
        // $collection->image = $request->image;
        $collection->firstgender = $request->firstgender;
        $collection->secondgender = $request->secondgender;
        $collection->thirdgender = $request->thirdgender;
        $collection->year = $request->year;
        $collection->description = $request->description;
        $collection->link = $request->link;

        $collection->save();

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
        return view('collection.edit', ['collection' => Collection::findOrFail($id)]);
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'firstgender'=> 'required|string',
            'secondgender'=> 'nullable|string',
            'thirdgender'=> 'nullable|string',
            'year'=> 'required|integer',
            'description' => 'required',
            'link' => 'required'
        ]);

        $collection->shortname = $request->shortname;
        $collection->fullname = $request->fullname;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img', 'public');
            $collection->image = $imagePath;
        }
        $collection->firstgender = $request->firstgender;
        $collection->secondgender = $request->secondgender;
        $collection->thirdgender = $request->thirdgender;
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
