@extends('layouts.app')

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
    
    @can('admin-role')
        <a href="/create" class="btn btn-success d-inline-block mx-3">商品登録</a>
    @endcan
    
    @if(isset($count) && $count > 0)
        <p>検索結果: {{ $count }} 件</p>
    @else
        <p>商品件数: {{ count($items) }} 件</p>
    @endif


    <div>
        <a href="/main_home">ホーム画面へ</a>
    </div>

    {{-- ログアウト --}}
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">ログアウト</button>
    </form>

    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th style="width: 10%">ID</th>
                <th style="width: 25%">名前</th>
                <th style="width: 25%">種別</th>
                <th style="width: 30%">詳細(行をクリックすると全表示する)</th>
                @can('admin-role')
                <th style="width: 10%">編集</th>
                @endcan
            </tr>
        </thead>
        <tbody>
          @foreach ($items as $item)
          {{-- データ属性 data-item-id に $item->id の値を格納 --}}
          <tr class="item-row" data-item-id="{{ $item->id }}">
              <td>{{ $item->id }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->type_name }}</td>
              <td class="item-detail-cell">
                  <div class="partial-detail">
                      {{ \Str::limit($item->detail, 50) }} <!-- 50文字まで表示 -->
                      @if (strlen($item->detail) > 50)
                          <span class="text-muted">...</span>
                      @endif
                  </div>
                  <div class="full-detail" style="display: none;">
                      {{ $item->detail }}
                  </div>
              </td>
              @can('admin-role')
              <td class="d-flex justify-content-between">
                  <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">編集</a>
                  <form action="/destroy/{{$item->id}}" method="post">
                      @csrf
                      <button class="btn btn-danger" type="submit">削除</button>
                  </form>
              </td>
              @endcan
          </tr>
          @endforeach
          
          
          
        </tbody>
    </table>
</div>
<script>
  // 各アイテム行にクリックイベントリスナーを追加します
  document.querySelectorAll('.item-row').forEach(function (row) {
      row.addEventListener('click', function () {
          // 詳細情報セル内の要素を取得
          var partialDetail = row.querySelector('.partial-detail');
          var fullDetail = row.querySelector('.full-detail');

          // 詳細情報の表示を切り替えます
          if (partialDetail.style.display === 'none' || partialDetail.style.display === '') {
              partialDetail.style.display = 'block';
              fullDetail.style.display = 'none';
          } else {
              partialDetail.style.display = 'none';
              fullDetail.style.display = 'block';
          }
      });
  });
</script>



@endsection
