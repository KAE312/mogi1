@extends('layouts.app')

@section('content')
<div class="address-edit-container">
    <h2>住所の変更</h2>

    <form action="{{ route('address.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="postal_code">郵便番号</label>
            <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code', $address->postal_code ?? '') }}">
        </div>

        <div class="form-group">
            <label for="address">住所</label>
            <input type="text" id="address" name="address" value="{{ old('address', $address->address ?? '') }}">
        </div>

        <div class="form-group">
            <label for="building">建物名</label>
            <input type="text" id="building" name="building" value="{{ old('building', $address->building ?? '') }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn-update">更新する</button>
        </div>
    </form>
</div>
@endsection
