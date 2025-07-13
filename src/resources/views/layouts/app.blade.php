<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>coachtech フリマアプリ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <link rel="stylesheet" href="{{ asset('css/items.css') }}">

    <link rel="stylesheet" href="{{ asset('css/create.css') }}">

    <link rel="stylesheet" href="{{ asset('css/item-show.css') }}">
    @yield('styles')
</head>
<body>

<header class="site-header">
    <div class="header-container">
        <h1 class="logo"><a href="{{ url('/') }}">COACHTECH</a></h1>

        @if (!request()->is('login') && !request()->is('register'))
            <div class="header-actions">
                <form method="GET" action="{{ route('items.index') }}" class="search-form">
                    <input type="text" name="keyword" placeholder="なにをお探しですか？">
                </form>

                <div class="header-right">
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                         @csrf
                    <button type="submit" class="nav-link" style="background:none; border:none; cursor:pointer;">ログアウト</button>
                    </form>
                    <a href="{{ route('mypage') }}" class="nav-link">マイページ</a>
                    <a href="{{ route('items.index') }}" class="nav-link">出品</a>
                </div>
            </div>
        @endif
    </div>
</header>

<main>
    @yield('content') 
 </main>
 </body>


