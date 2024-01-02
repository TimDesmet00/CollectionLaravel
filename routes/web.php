<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;

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

Route::get('collection', [CollectionController::class, 'index'])->name('collection.index');

Route::get('collection/create', [CollectionController::class, 'create'])->name('collection.create');

Route::post('collection/create', [CollectionController::class, 'store'])->name('collection.store');

Route::get('collection/{collection}', [CollectionController::class, 'show'])->name('collection.show');

Route::get('collection/{collection}/edit', [CollectionController::class, 'edit'])->name('collection.edit');

Route::put('collection/{collection}', [CollectionController::class, 'update'])->name('collection.update');

Route::delete('collection/{collection}', [CollectionController::class, 'destroy'])->name('collection.destroy');