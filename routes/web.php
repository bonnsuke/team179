<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// HomeController コントローラーの index メソッドを実行
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

// logoutする
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// ホーム画面へ
Route::get('main_home', [App\Http\Controllers\HomeController::class,'create'])->name('');

// 認証用のURL一式
Auth::routes();

Route::get('/items',[App\Http\Controllers\ItemController::class, 'index'])->name('items');
// Route::get('/items', [\App\Http\Controllers\ItemController::class, 'items'])->name('items');
Route::get('/search',[App\Http\Controllers\ItemController::class, 'index'])->name('items');

// 管理者権限以上のアカウントでアクセスができるURLの定義
Route::group(['middleware' => 'auth', 'can:admin-role'], function () {
    //商品 登録
    Route::get('/create', [\App\Http\Controllers\ItemController::class, 'create'])->name('create');
    Route::post('/store', [\App\Http\Controllers\ItemController::class, 'store']);
    
    //商品 編集
    Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('items.edit');
    Route::post('/update/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('items.update');
    
    Route::post('/destroy/{id}',[App\Http\Controllers\ItemController::class, 'destroy']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
