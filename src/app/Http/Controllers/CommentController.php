<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Item;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Item $item)
    {
        Comment::create([
            'user_id' => auth()->id(),
            'item_id' => $item->id,
            'comment' => $request->comment,
        ]);

        return redirect()->route('items.show', $item->id)->with('success', 'コメントを投稿しました');
    }
}
