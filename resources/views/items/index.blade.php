@extends('layouts.app')

@section('content')
<body>
    <h1>商品管理システム</h1>
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
          <th style = "width: 30%">名前</th>
          <th style = "width: 30%">種別</th>
          <th style = "width: 30%">詳細</th>
        </tr>
       </thead>
    <tbody>
    @foreach ($items as $item)
      <tr>
        <td>{{ $item->id }} </td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->type_name }} </td>
        <td>{{ $item->detail }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
@endsection
</html>