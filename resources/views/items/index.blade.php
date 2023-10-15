<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>商品一覧画面</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <h1 class="text-center">商品管理システム</h1>
    <h2>商品一覧</h2>
    <div>
      <form action="/search" method="get">
        <input type="text" name="keyword">
        <input type="submit" value="検索">
     </form>
    </div>
    <div class="text-end">
      <a href="/create">商品登録</a>
      @can('admin')
      <a href="">商品登録</a>
      @endcan
    </div>
    <table class="table table-striped table-responsive">
      <thead>
        <tr>
          <th style = "width: 10%">ID</th>
          <th style = "width: 25%">名前</th>
          <th style = "width: 25%">種別</th>
          <th style = "width: 30%">詳細</th>
          <th style = "width: 10%">削除</th>
          @can('admin')
          <th style = "width: 10%">削除</th>
          @endcan
        </tr>
       </thead>
    <tbody>
    @foreach ($items as $item)
      <tr>
        <td>{{ $item->id }} </td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->type_name }} </td>
        <td>{{ $item->detail }}</td>
        <td>
          <form action="/destroy/{{$item->id}}" method="post">
            @csrf
            <button class=" btn btn-danger" type="submit">削除</button>
          </form>
        </td>
        @can('admin')
        <td>
          <form action="/destroy/{{$item->id}}" method="post">
            @csrf
            <button class=" btn btn-danger" type="submit">削除</button>
          </form>
        </td>
        @endcan
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>