<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Collection;

class FavoritesController extends Controller
{
    public function store(Request $request, Collection $collection)
    {
        Auth::user()->addFavorite($collection);

        return back();
    }

    public function destroy(Request $request, Collection $collection)
    {
        Auth::user()->removeFavorite($collection);

        return back();
    }
}
