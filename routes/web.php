<?php

use App\Http\Controllers\LikeController;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::prefix('tweets')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\TweetController::class, 'index'])->name('home');
    Route::post('/', [App\Http\Controllers\TweetController::class, 'store'])->name('tweets');
});
    Route::get('/profile/{user:username}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');
    Route::get('/explore', [\App\Http\Controllers\ExplorerController::class,'index'])->name('explore');
    Route::get('/profile/{user:username}/edit', [App\Http\Controllers\ProfileController::class,'edit'])->middleware('can:edit,user');
    Route::patch('/profile/{user:username}', [App\Http\Controllers\ProfileController::class,'update'])->middleware('can:edit,user');
    Route::post('/profile/{user:username}/follow', [App\Http\Controllers\FollowController::class,'post'])->name('follow');
    Route::post('/liked/{tweet}', [LikeController::class,'like']);
    Route::post('/disliked/{tweet}', [LikeController::class,'dislike']);
