<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class AddressController extends Controller
{
    public function editAddress()
{
    $user = auth()->user();
    $address = $user->address;
    return view('purchase.address', compact('address'));
}

public function updateAddress(Request $request)
{
    $request->validate([
        'postal_code' => 'required|max:10',
        'address' => 'required|string|max:255',
        'building_name' => 'nullable|string|max:255',
    ]);

    $user = auth()->user();
    $user->address()->updateOrCreate(
        ['user_id' => $user->id],
        $request->only('postal_code', 'address', 'building_name')
    );

    return redirect()->route('purchase.confirm')->with('success', '住所を更新しました');
}
}
