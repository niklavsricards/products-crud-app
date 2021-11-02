<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [ProductController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/products/create', [ProductController::class, 'createForm'])
    ->middleware(['auth'])
    ->name('create.form');
Route::post('/products/create', [ProductController::class, 'create'])
    ->middleware(['auth'])
    ->name('create');

Route::get('/products/update/{id}', [ProductController::class, 'updateForm'])
    ->middleware(['auth'])
    ->name('update.form');
Route::post('/products/update/{id}', [ProductController::class, 'update'])
    ->middleware(['auth'])
    ->name('update');

Route::post('/products/delete/{id}', [ProductController::class, 'delete'])
    ->middleware(['auth'])
    ->name('delete');

Route::get('/products/view/{id}', [ProductController::class, 'view'])
    ->middleware(['auth'])
    ->name('view');

require __DIR__.'/auth.php';
