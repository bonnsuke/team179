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



Route::get('/items',[App\Http\Controllers\ItemController::class, 'index'])->name('items');
Route::get('/search',[App\Http\Controllers\ItemController::class, 'search'])->name('items');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
   


// 管理者以上
Route::group(['middleware' => ['auth', 'can:admin-role']], function () {
    //ここにルートを記述

//     Route::get('items', [App\Http\Controllers\ItemController::class, 'showAdmin']);
    Route::post('/destroy/{id}',[App\Http\Controllers\ItemController::class, 'destroy']);


});
