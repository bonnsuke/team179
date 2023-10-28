<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アイテム登録画面</title>
    <style>
         /* サイドバーのスタイル */
         .sidebar {
            height: 100%;
            width: 250px; /* サイドバーの幅を調整 */
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f8f9fa; /* サイドバーの背景色 */
            padding-top: 20px; /* サイドバー内の上部余白 */
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .form-container {
            width: 70%; /* フォームコンテナの幅を設定 */
            margin: 0 auto; /* フォームコンテナを中央寄せ */
        }
        form {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        a.button {
            background-color: #f8f9fa; /* デフォルトの背景色 */
            color: #000; /* デフォルトのテキスト色 */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none; /* リンクの下線を削除 */
        }
    </style>
</head>
<body>
    <!-- サイドバー -->
    <div class="sidebar">
        <h2>商品管理システム</h2>
        <p>商品一覧</p>
        <!-- 他のメニューアイテムを追加できます -->
    </div>

    <!-- メインコンテンツ -->
    <div class="content">
        <a href="/items" class="button">戻る</a>
        <div class="form-container">
            <form action="/store" method="post">
                @csrf
                <h2>商品登録</h2>
                <label for="name">名前</label>
                <input type="text" name="name" id="name" required>
                <label for="type_id">種別</label>
                <select class="form-control" name="type_id" id="type">
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->type_name }}</option> <!-- 種別のリストを表示 -->
                    @endforeach
                </select>
                <label for="detail">詳細</label>
                <input type="text" name="detail" id="detail">
                <button type="submit">登録</button>
            </form>
        </div>
    </div>
</body>
</html>