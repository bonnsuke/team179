<!DOCTYPE html>
<html>
<head>
    <title>商品管理システム</title>
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
            <!-- メインコンテンツ -->
                @yield('content')
            </div>
</body>
</html>

