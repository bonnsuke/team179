<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>アイテム編集画面</title>
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
        <h3>商品管理システム</h3>
        <!-- 他のメニューアイテムを追加できます -->
    </div>


    <!-- メインコンテンツ -->
    <div class="content">
        <a href="/items" class="button">戻る</a>
        <div class="form-container">
            <form action="{{ route('items.update', ['id' => $item->id]) }}" method="post">

                @csrf
                <h2>商品編集</h2>
                <label for="name">名前</label>
                    <input type="text" name="name" id="name" required value="{{ $item->name }}">
                <label for="type_id">種別</label>
                <select name="type_id" id="type_id" class="form-control">
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ $item->type_id == $type->id ? 'selected' : '' }}>
                            {{ $type->type_name }}
                        </option>
                    @endforeach
                </select>                
                <label for="detail">詳細</label>
                    <input type="text" name="detail" id="detail" value="{{ $item->detail }}">
                <button type="submit">更新</button>
            </form>
        </div>
    </div>
</body>
</html>
