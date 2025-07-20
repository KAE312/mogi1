<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
</head>
<body>
    <header class="guest-header">
    <div class="header-container">
    <h1 class="logo"><a href="{{ url('/') }}">COACHTECH</a></h1>
    </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
