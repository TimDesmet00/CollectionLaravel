<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoritesController;


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

//route pour la page d'accueil
Route::get('/', [CollectionController::class, 'index'])->name('collection.index');

//route pour les collections
Route::prefix('collection')->group(function () {
    Route::get('create', [CollectionController::class, 'create'])->name('collection.create')->middleware(['auth', 'verified']);
    Route::post('create', [CollectionController::class, 'store'])->name('collection.store')->middleware(['auth', 'verified']);
    Route::get('{collection}', [CollectionController::class, 'show'])->name('collection.show');
    Route::get('{collection}/edit', [CollectionController::class, 'edit'])->name('collection.edit')->middleware(['auth', 'verified']);
    Route::put('{collection}', [CollectionController::class, 'update'])->name('collection.update')->middleware(['auth', 'verified']);
    Route::delete('{collection}', [CollectionController::class, 'destroy'])->name('collection.destroy')->middleware(['auth', 'verified']);
});

//route pour les utilisateurs
Route::prefix('user')->group(function () {
    Route::get('create', [UserController::class, 'create'])->name('user.create');
    Route::post('create', [UserController::class, 'store'])->name('user.store');
    Route::get('show/{id}', [UserController::class, 'show'])->name('user.show')->middleware(['auth', 'verified']);
    Route::get('{user}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware(['auth', 'verified']);
    Route::put('{user}', [UserController::class, 'update'])->name('user.update')->middleware(['auth', 'verified']);
    Route::delete('{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware(['auth', 'verified']);
});

//route pour les login/logout
Route::get('login', [UserController::class, 'loginForm'])->name('user.login');
Route::post('login', [UserController::class, 'login']);
Route::post('logout', [UserController::class, 'logout'])->name('logout');

//route pour les validation d'e-mail
Route::get('/email/verify', function () {
    return redirect('/')->with('message', 'Veuillez vérifier votre adresse email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::post('/favorites/{collection}', [FavoritesController::class, 'store'])->name('favorites.store')->middleware(['auth', 'verified']);
Route::delete('/favorites/{collection}', [FavoritesController::class, 'destroy'])->name('favorites.destroy')->middleware(['auth', 'verified']);