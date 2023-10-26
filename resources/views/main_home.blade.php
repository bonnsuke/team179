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
            font-size: 18px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- サイドバー -->
            <div class="col-2 bg-light text-dark sidebar border-end border-info border-5" style="height: 100vh;">
                <ul class="list-unstyled">
                    <h1 class="text-center">MENU</h1>
                    <li><a href="items"><button type="submit" class="btn btn-outline-primary">商品一覧</button></a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            
                            <button type="submit" class="btn btn-outline-primary">ログアウト</button>
                        </form>
                    </li>        
                </ul>
            </div>
            <!-- メインコンテンツ -->
            <div class="col-10">
                <header class="bg-primary text-white p-3 opacity-75 p-2 m-1 bg-primary text-light fw-bold rounded">
                    <h1 class="text-center">商品管理システム</h1>
                </header>

                <main class="p-3 opacity-50 p-2 m-1 bg-primary text-light fw-bold rounded">
                    <p class="h1 text-center">HOME画面へようこそ</p>
                </main>
            </div>
        </div>
    </div>
</body>
</html>
