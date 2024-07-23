<?php

use App\Http\Controllers\Cars;
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

Route::prefix('cars')->group(function (){
    Route::get('/', [Cars::class, 'index'])->name('car.index');
    Route::get('/create', [Cars::class, 'create'])->name('car.create');
    Route::get('/{car}', [Cars::class, 'show'])->name('car.show');
    Route::get('/{car}/edit', [Cars::class, 'edit'])->name('car.edit');
    Route::post('/', [Cars::class, 'store'])->name('car.store');
    Route::put('/{car}', [Cars::class, 'update'])->name('car.update');
    Route::delete('/{car}', [Cars::class, 'destroy'])->name('car.destroy');
});

