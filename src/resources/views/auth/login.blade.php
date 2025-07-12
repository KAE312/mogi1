@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="login-body">
    <div class="login-container">
        <h2>ログイン</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}">
                @error('email')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">パスワード</label>
                <input id="password" type="password" name="password">
                @error('password')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group center">
                <button type="submit">ログインする</button>
            </div>

            <div class="register-link center">
                <a href="{{ route('register') }}">会員登録はこちら</a>
            </div>
        </form>
    </div>
</div>
@endsection