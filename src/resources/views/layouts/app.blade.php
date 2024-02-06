<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <title>Rese</title>
</head>
<body>
    <header class="app-header">
        <form class="icon-form" action="/menu" method="get">
            @csrf
            <div class="header-icon">
                <button class="header-icon_button">
                    ――
                    ――――
                    ―
                </button>
            </div>
        </form>
        <div class="header-icon_name">
            Rese
        </div>
        @yield('header_content')
    </header>
    <main class="app-main">
        @yield('main_content')
    </main>
</body>
</html>