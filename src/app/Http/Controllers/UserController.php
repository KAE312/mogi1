<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('users.edit', compact('user'));
    }

    public function purchased()
    {
        $user = auth()->user();
        $purchasedItems = \App\Models\Item::where('buyer_id', $user->id)->get();

        return view('users.purchased', compact('purchasedItems'));
    }
}
