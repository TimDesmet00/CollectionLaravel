<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\UserController;

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
    return view('Layout');
});

Route::prefix('collection')->group(function () {
    Route::get('/', [CollectionController::class, 'index'])->name('collection.index');
    Route::get('create', [CollectionController::class, 'create'])->name('collection.create');
    Route::post('create', [CollectionController::class, 'store'])->name('collection.store');
    Route::get('{collection}', [CollectionController::class, 'show'])->name('collection.show');
    Route::get('{collection}/edit', [CollectionController::class, 'edit'])->name('collection.edit');
    Route::put('{collection}', [CollectionController::class, 'update'])->name('collection.update');
    Route::delete('{collection}', [CollectionController::class, 'destroy'])->name('collection.destroy');
});

Route::prefix('user')->group(function () {
    Route::get('create', [UserController::class, 'create'])->name('user.create');
    Route::post('create', [UserController::class, 'store'])->name('user.store');
    Route::get('{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('{user}', [UserController::class, 'destroy'])->name('user.destroy');
});