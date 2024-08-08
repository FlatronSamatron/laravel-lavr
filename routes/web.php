<?php

use App\Http\Controllers\Brands;
use App\Http\Controllers\Cars;
use App\Http\Controllers\Comments;
use App\Http\Controllers\Posts;
use App\Models\Comment;
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

Route::get('/', fn()=>view('welcome'))->name('welcome');

Route::post('/{type}/{id}/comments', [Comments::class, 'store'])->name('comments.store');

Route::get('/posts', [Posts::class, 'index'])->name('post.index');
Route::get('/posts/create', [Posts::class, 'create'])->name('post.create');
Route::post('/posts', [Posts::class, 'store'])->name('post.store');
Route::get('/posts/{id}', [Posts::class, 'show'])->name('post.show');
Route::get('/posts/{id}/edit', [Posts::class, 'edit'])->name('post.edit');
Route::put('/posts/{id}', [Posts::class, 'update'])->name('post.update');



Route::prefix('cars')->group(function (){
    Route::get('/', [Cars::class, 'index'])->name('car.index');
    Route::get('/create', [Cars::class, 'create'])->name('car.create');
    Route::get('/{car}', [Cars::class, 'show'])->name('car.show')->whereNumber('car');
    Route::get('/{car}/edit', [Cars::class, 'edit'])->name('car.edit');
    Route::post('/', [Cars::class, 'store'])->name('car.store');
    Route::put('/{car}', [Cars::class, 'update'])->name('car.update');
    Route::delete('/{car}', [Cars::class, 'destroy'])->name('car.destroy');


    Route::prefix('deleted')->group(function(){
        Route::get('/', [Cars::class, 'deleted'])->name('car.deleted');
        Route::delete('/{id}', [Cars::class, 'destroyDeleted'])->name('car.delete');
        Route::put('/{id}', [Cars::class, 'restoreDeleted'])->name('car.restore');
    });
});

Route::prefix('brands')->controller(Brands::class)->group(function (){
    Route::get('/', 'index')->name('brands.index');
    Route::get('/create', 'create')->name('brands.create');
    Route::get('/{brand}', 'show')->name('brands.show')->whereNumber('car');
    Route::get('/{brand}/edit', 'edit')->name('brands.edit');
    Route::post('/', 'store')->name('brands.store');
    Route::put('/{brand}', 'update')->name('brands.update');
    Route::delete('/{brand}', 'destroy')->name('brands.destroy');
});



//Route::resource('brands', Brands::class);



