<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; 
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Condition;
use App\Http\Requests\ExhibitionRequest;

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
            $items = Item::where('user_id', '<>', $userId)->get();
        }
    
        return view('items.index', compact('items', 'tab'));
    }

    public function create()
    {
        $categories = Category::all(); 
        $conditions = Condition::all();
        return view('items.create', compact('categories', 'conditions'));
    }

    public function store(ExhibitionRequest $request)
    {
        $item = Item::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'brand' => $request->brand,
            'description' => $request->description,
            'price' => $request->price,
            'condition_id' => $request->condition_id, 
        ]);

        $item->categories()->sync($request->categories);

        return redirect()->route('items.create')->with('success', '商品を出品しました');
    }

    public function show($id)
    {
        //複数カテゴリーの表示
        $item = Item::with(['categories', 'comments.user'])->findOrFail($id);
        $favoriteCount = $item->favorites()->count();
        $commentCount = $item->comments()->count();
    
        $data = [
            'item' => $item,
            'favorite_count' => $favoriteCount,
            'comment_count' => $commentCount,
        ];
        //未ログインユーザーの表示
        if (Auth::check()) {
            $user = Auth::user();
           
            return view('items.show', [
                'item' => $item,
                'favorite_count' => $favoriteCount,
                'comment_count' => $commentCount,
                'user' => $user,
            ]);
        } else {
            return view('items.show', [
                'item' => $item,
                'favorite_count' => $favoriteCount,
                'comment_count' => $commentCount,
            ]);
        } 
    }
}