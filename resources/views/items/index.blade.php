@extends('layouts.app');

@section('content')
    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message bg-success text-white mb-3 w-25 mx-auto p-3">
            {{ session('flash_message') }}
        </div>
    @endif
    <form action="/search" method="get" class="d-inline-block">
      @csrf
      <input type="text" name="keyword">
      <input type="submit" value="検索">
  </form>
  @if(isset($count) && $count > 0)
      <p>検索結果: {{ $count }} 件</p>
  @endif
    @can('admin-role')
      <a href="/create" class="btn btn-success d-inline-block mx-3">商品登録</a>
    @endcan
    <div>
    <a href="/main_home">ホーム画面へ</a>
    </div>
    {{-- ログアウト --}}
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit">ログアウト</button>
  </form>
    </div>
    <table class="table table-striped table-responsive">
      <thead>
        <tr>
          <th style = "width: 10%">ID</th>
          <th style = "width: 25%">名前</th>
          <th style = "width: 25%">種別</th>
          <th style = "width: 30%">詳細</th>
          @can('admin-role')
          <th style = "width: 10%">編集</th>
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
        @can('admin-role')
        <td>
          <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">編集</a>
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
@endsection