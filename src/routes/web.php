<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ItemsController;

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

Route::get('/', function () {
    return view('welcome');
});

// 会員登録画面
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');

//登録処理
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

Route::get('/email/verify', function () {
    return view('auth.verify-email');  
})->name('verification.notice');

Auth::routes(['verify' => true]);

// 認証必須の画面
Route::get('/dashboard', function () {
   return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');

    Route::post('/users/update', [UserController::class, 'update'])->name('users.update');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/mypage', function () {
    return view('mypage');
})->name('mypage');

// ログイン画面
Route::get('/login', function () {
    return view('auth.login'); 
})->middleware('guest')->name('login');

//商品一覧画面
Route::get('/items', [ItemsController::class, 'index'])->name('items.index');

//商品出品画面
Route::middleware('auth')->group(function () {
Route::get('/items/create', [ItemsController::class, 'create'])->name('items.create');
Route::post('/items', [ItemsController::class, 'store'])->name('items.store');
});

//商品詳細画面
Route::get('/item/{item}', [ItemsController::class, 'show'])->name('items.show');

Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

//商品購入画面
Route::get('/purchase/{item}', [PurchaseController::class, 'index'])->name('purchase.index');

//商品詳細画面のいいね
Route::middleware('auth')->group(function () {
    Route::post('/items/{item}/favorite', [FavoriteController::class, 'store'])->name('favorite.store');
    Route::delete('/items/{item}/favorite', [FavoriteController::class, 'destroy'])->name('favorite.destroy');
});