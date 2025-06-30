<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ProfileController;

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


Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware(['guest'])
    ->name('register');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/mypage', function () {
      return view('mypage');
    })->name('mypage');
});
