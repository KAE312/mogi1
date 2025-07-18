<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store(Item $item)
    {
        Auth::user()->favorites()->attach($item->id);
        return response()->json(['status' => 'liked', 'count' => $item->favorites()->count()]);
    }

    public function destroy(Item $item)
    {
        Auth::user()->favorites()->detach($item->id);
        return response()->json(['status' => 'unliked', 'count' => $item->favorites()->count()]);
    }
}

