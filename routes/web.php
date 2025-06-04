<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require __DIR__ . '/auth.php';

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;


Route::get('/', [HomeController::class, 'getHome'])->middleware('auth');
Route::get('/category', [CategoryController::class, 'getIndex'])->middleware('auth');
Route::get('/category/create', [CategoryController::class, 'getCreate'])->middleware('auth');
Route::post('/category/create', [CategoryController::class, 'postCreate'])->middleware('auth');

Route::get('/category/edit/{id}', [CategoryController::class, 'getEdit'])->middleware('auth');
Route::put('/category/edit/{id}', [CategoryController::class, 'putEdit'])->middleware('auth');
Route::get('/category/show/{id}', [CategoryController::class, 'getShow'])->middleware('auth');
Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->middleware('auth');

// rutas de Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
