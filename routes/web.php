<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/items', [\App\Http\Controllers\ItemController::class, 'items'])->name('items');

// アイテム登録
Route::get('/create', [\App\Http\Controllers\ItemController::class, 'create'])->name('create');
Route::post('/store', [\App\Http\Controllers\ItemController::class, 'store']);

//アイテム 編集
Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('items.edit');
Route::post('/update/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('items.update');

