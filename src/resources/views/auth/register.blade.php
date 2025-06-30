@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register-body">
    <div class="register-container">
        <h2>会員登録</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div style="margin-bottom: 20px;">
                <label>ユーザー名</label><br>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus>

                @error('name')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label>メールアドレス</label><br>
                <input type="email" name="email" value="{{ old('email') }}" required>

                @error('email')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label>パスワード</label><br>
                <input type="password" name="password" required>

                @error('password')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 30px;">
                <label>確認用パスワード</label><br>
                <input type="password" name="password_confirmation" required>
            </div>

            <div style="text-align: center;">
                <button type="submit">登録する</button>
            </div>

            <div class="link">
                <a href="{{ route('login') }}">ログインはこちら</a>
            </div>  
        </form>
    </div>
</div>
@endsection
