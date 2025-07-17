@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="profile-wrapper">
    <h2>プロフィール設定</h2>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="profile-image-wrapper">
            <div class="image-circle">
                @if (Auth::user()->profile_image)
                    <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="プロフィール画像">
                @else
                    <div class="placeholder"></div>
                @endif
            </div>
            <input type="file" name="profile_image" class="image-upload">
        </div>

        <div class="form-group">
            <label>ユーザー名</label>
            <input type="text" name="username" value="{{ old('username', Auth::user()->username) }}">
        </div>

        <div class="form-group">
            <label>郵便番号</label>
            <input type="text" name="postal_code" value="{{ old('postal_code', Auth::user()->postal_code) }}">
        </div>

        <div class="form-group">
            <label>住所</label>
            <input type="text" name="address" value="{{ old('address', Auth::user()->address) }}">
        </div>

        <div class="form-group">
            <label>建物名</label>
            <input type="text" name="building" value="{{ old('building', Auth::user()->building) }}">
        </div>

        <div class="form-button">
            <button type="submit">更新する</button>
        </div>
    </form>
</div>
@endsection
