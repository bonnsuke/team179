<!DOCTYPE html>
<html>
<head>
    <title>商品管理システム(ホーム)</title>
    <!-- Bootstrap CSSを組み込む -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <style>
 

        /* メニューアイテムのスタイル */
        .sidebar li {
            text-align: center;
            font-size: 20px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- サイドバー -->
            <div class="col-2 bg-dark text-white sidebar" >
                <ul class="list-unstyled">
                    <h1 class="text-center">MENU</h1>
                    <li><a href="items">商品一覧</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form>
                    </li>        
                </ul>
            </div>
            <!-- メインコンテンツ -->
            <div class="col-10" >
                <header class="bg-primary text-white p-3">
                    <h1 class="text-center">商品管理システム</h1>
                </header>
                @yield('content')
            </div>
</body>
</html>

