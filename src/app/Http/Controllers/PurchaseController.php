<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;

class PurchaseController extends Controller
{
    public function show(Item $item)
    {
        $user = auth()->user();
    
        $paymentMethods = [
            '' => '選択してください',
            'convenience_store' => 'コンビニ支払い',
            'credit_card' => 'カード支払い',
        ];

        return view('purchase.show', compact('item', 'user', 'paymentMethods'));
    }

    public function store(PurchaseRequest $request, Item $item)
    {
        //すでに売られている場合
        if ($item->is_sold) {
            return redirect()->back()->with('error', 'この商品は既に購入されています。');
        }

        $item->buyer_id = Auth::id();
        $item->is_sold = true;
        $item->save();
    
        return redirect()->route('purchase.complete');->with('success', '購入が完了しました。');
    }
}

