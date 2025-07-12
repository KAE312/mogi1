<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; 
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->query('tab', 'recommend'); // デフォルトはおすすめ
        $userId = Auth::id();
    
        if ($tab === 'mylist') {
            // マイリストは、ログインしているユーザーのいいねした商品
            $items = Auth::check()
                ? Auth::user()->likedItems()->with('user')->get()
                : collect(); // 未ログインなら空
        } else {
            // おすすめは、全商品（自分の商品は除外）
            $items = Item::when($userId, fn($q) => $q->where('user_id', '<>', $userId))->get();
        }
    
        return view('items.index', compact('items', 'tab'));
    }
}
