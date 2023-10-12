<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アイテム一覧画面</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* 登録ボタンのスタイル */
        .registration-button {
            position: fixed;
            top: 10px; /* ボタンの上からの位置 */
            right: 10px; /* ボタンの右からの位置 */
            background-color: #007bff; /* ボタンの背景色 */
            color: #fff; /* ボタンのテキスト色 */
            padding: 10px 20px; /* ボタンの内側のパディング */
            border: none;
            border-radius: 5px; /* ボタンの角丸 */
            cursor: pointer;
        }

        /* メインコンテンツのマージン */
        .content {
            margin-left: 250px;
            padding: 20px;
            margin-top: 40px; /* マージンを追加 */
        }

        /* 編集ボタンのスタイル */
        .edit-button {
            background-color: #28a745; /* ボタンの背景色を緑に設定 */
            color: #fff; /* ボタンのテキスト色を白に設定 */
            padding: 6px 12px; /* ボタンの内側のパディングを調整 */
            border: none;
            border-radius: 4px; /* ボタンの角丸を設定 */
            text-decoration: none; /* テキストの下線を削除 */
            display: inline-block;
            transition: background-color 0.3s; /* ホバー時のアニメーションを設定 */
        }

        .edit-button:hover {
            background-color: #218838; /* ホバー時の背景色を変更 */
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
    <a href="/create" class="registration-button">商品登録</a>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>種別</th>
                    <th>詳細</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->type_id }}</td>
                    <td>{{ $item->detail }}</td>
                    <td><a href="/edit" class="edit-button">編集</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
