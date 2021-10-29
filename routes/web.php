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

Route::get('/', [\App\Http\Controllers\AdController::class, 'index'])->name('home');
Route::get('/{id}', [\App\Http\Controllers\AdController::class, 'show'])->whereNumber('id')->name('ads.show');

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->middleware('guest');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/edit/{ad?}', [\App\Http\Controllers\AdController::class, 'create'])->name('ads.create')->middleware('auth');
Route::post('/edit/{ad?}', [\App\Http\Controllers\AdController::class, 'save'])->middleware('auth');

Route::get('/delete/{ad}', [\App\Http\Controllers\AdController::class, 'delete'])->name('ads.delete')->middleware('auth');

Route::get('/oauth', [\App\Http\Controllers\OauthController::class, 'index']);
Route::get('/callback', [\App\Http\Controllers\OauthController::class, 'callback']);
