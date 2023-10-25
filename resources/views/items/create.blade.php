@extends('layouts.app');
@section('content')
<!-- メインコンテンツ -->
<div class="content">

    <form class="w-50 m-auto" action="/store" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">名前</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">種別</label>
            <select name="type_id" id="type_id" class="form-control">
                <option value=""></option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="detail" class="form-label">詳細</label>
            <input type="text" name="detail" id="detail" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">登録</button>
    </form>
</div>
@endsection