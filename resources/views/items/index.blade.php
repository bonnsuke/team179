<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>商品一覧画面</title>
</head>
<body>
    <h1>商品管理システム</h1>
    <h2>商品一覧</h2>
    <div>
      <form action="/search" method="get">
        <input type="text" name="keyword">
        <input type="submit" value="検索">
     </form>
    </div>
    <div>
      <a href="">商品登録</a>
      @can('admin')
      <a href="">商品登録</a>
      @endcan
    </div>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>名前</th>
          <th>種別</th>
          <th>詳細</th>
        </tr>
       </thead>
    <tbody>
    @foreach ($items as $item)
      <tr>
        <td>{{ $item->id }} </td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->type_id }} </td>
        <td>{{ $item->detail }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>