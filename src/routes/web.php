<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);


Route::get('/register', [AuthController::class, 'create'])->name('register'); 
//ユーザーが/registerにアクセスした際に、createメソッドが呼びされ、registerページが表示される。

Route::post('/register', [AuthController::class, 'store']);
//ユーザー登録フォームのデータを処理し、ユーザーをデータベースに保存する。


//Route::get('/login', [AuthController::class, 'store'])->name('login');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

//ログインフォームが送信されたときに AuthController の login メソッドを呼び出します。このメソッドは、ユーザーの資格情報を検証し、ログインを処理します。
Route::post('/login', [AuthController::class, 'login']);


// 会員登録の処理
//Route::post('/register', [AuthController::class, 'store']);

// 管理画面の表示
Route::get('/admin', [AuthController::class, 'index'])->name('admin')->middleware('auth');

// 詳細表示のルートを追加
Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
