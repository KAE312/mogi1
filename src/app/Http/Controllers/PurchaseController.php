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
        return redirect()->route('purchase.complete');
    }
}

