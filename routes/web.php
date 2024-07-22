<?php

use App\Http\Controllers\Posts;
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

Route::get('/posts', [Posts::class, 'index'])->name('post.index');
Route::get('/posts/create', [Posts::class, 'create'])->name('post.create');
Route::post('/posts', [Posts::class, 'store'])->name('post.store');
Route::get('/posts/{id}', [Posts::class, 'show'])->name('post.show');

