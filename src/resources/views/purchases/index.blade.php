@extends('layouts.app')

@section('content')
<div class="container" style="display:flex; gap: 40px;">

    <!-- 左カラム -->
    <div style="width:60%;">
        <div style="display: flex; align-items: center;">
            <img src="{{ asset('storage/' . $item->image_path) }}" alt="商品画像" style="width:150px; height:150px; object-fit:cover;">
            <div style="margin-left: 20px;">
                <h3>{{ $item->name }}</h3>
                <p>¥ {{ number_format($item->price) }}</p>
            </div>
        </div>

        <hr>

        <div>
            <strong>支払い方法</strong><br>
            <select name="payment_method">
                <option value="">選択してください</option>
                <option value="コンビニ払い">コンビニ払い</option>
                <option value="クレジットカード">クレジットカード</option>
            </select>
        </div>

        <hr>

        <div>
            <strong>配送先</strong>
            <p>〒 {{ $user->postcode ?? 'XXX-YYYY' }}<br>
            {{ $user->address ?? 'ここには住所と建物が入ります' }}</p>
            <a href="{{ route('profile.edit') }}">変更する</a>
        </div>
    </div>

    <!-- 右カラム -->
    <div style="width:35%;">
        <table border="1" style="width:100%; text-align:left;">
            <tr>
                <td>商品代金</td>
                <td>¥ {{ number_format($item->price) }}</td>
            </tr>
            <tr>
                <td>支払い方法</td>
                <td>コンビニ払い</td>
            </tr>
        </table>
        <br>
        <button style="width:100%; padding: 10px; background-color: #ff6b6b; color: white; font-size: 16px;">購入する</button>
    </div>

</div>
@endsection
