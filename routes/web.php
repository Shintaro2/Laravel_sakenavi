<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ホーム画面を表示
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//日本酒一覧画面を表示
Route::get('/all', 'App\Http\Controllers\SakenaviController@showDetail')->name('all')->middleware('auth');

//日本酒登録画面を表示
Route::get('/create', 'App\Http\Controllers\SakenaviController@showCreate')->name('create')->middleware('auth');

//日本酒登録
Route::post('/store', 'App\Http\Controllers\SakenaviController@exeStore')->name('store');

//ガチャページを表示
Route::get('/random', 'App\Http\Controllers\SakenaviController@showRandom')->name('random')->middleware('auth');

//ガチャリザルトを表示
Route::get('/randomresult', 'App\Http\Controllers\SakenaviController@showRandomresult')->name('randomresult');

//日本酒編集画面を表示
Route::get('/edit/{id}', 'App\Http\Controllers\SakenaviController@showEdit')->name('edit')->middleware('auth');

//日本酒編集登録
Route::post('/update/{id}', 'App\Http\Controllers\SakenaviController@exeUpdate')->name('update');

//日本酒削除
Route::post('/delete/{id}', 'App\Http\Controllers\SakenaviController@exeDelete')->name('delete');
