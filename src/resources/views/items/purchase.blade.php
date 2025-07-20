@extends('layouts.app')

@section('content')
<div class="purchase-container">
    <div class="left-section">
        <div class="item-info">
            <div class="item-image">
                <img src="{{ asset($item->image_path) }}" alt="商品画像" width="120" height="120">
            </div>
            <div class="item-name-price">
                <p><strong>商品名</strong></p>
                <p>¥{{ number_format($item->price) }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('purchase.store', $item) }}">
            @csrf
            <div class="section">
                <label for="payment_method"><strong>支払い方法</strong></label><br>
                <select name="payment_method" id="payment_method" required>
                    @foreach($paymentMethods as $key => $label)
                        <option value="{{ $key }}" @if(old('payment_method') == $key) selected @endif>{{ $label }}</option>
                    @endforeach
                </select>
                @error('payment_method')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="section">
                <strong>配送先</strong> <a href="{{ route('address.edit') }}" style="color:#0080ff;">変更する</a><br>
                <p>〒 {{ $user->postal_code ?? 'XXX-YYYY' }}<br>
                {{ $user->address ?? 'ここには住所と建物が入ります' }}</p>
            </div>

            <button type="submit" class="btn-purchase">購入する</button>
        </form>
    </div>

    <div class="right-section">
        <table class="purchase-summary">
            <tr>
                <th>商品代金</th>
                <td>¥{{ number_format($item->price) }}</td>
            </tr>
            <tr>
                <th>支払い方法</th>
                <td>{{ $paymentMethods[old('payment_method', '')] ?? '選択してください' }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
