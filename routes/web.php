<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [ShopController::class, 'index']);
Route::get('/shops/create', [ShopController::class, 'create']);
Route::get('/shops/{shop}', [ShopController::class ,'show']);
Route::post('/shops', [ShopController::class, 'store']);


Route::controller(ShopController::class)->middleware(['auth'])->group(function(){
    Route::get('/register', 'index')->name('index');
    // Route::post('/posts', 'store')->name('store');
    // Route::get('/posts/create', 'create')->name('create');
    // Route::get('/posts/{post}', 'show')->name('show');
    // Route::put('/posts/{post}', 'update')->name('update');
    // Route::delete('/posts/{post}', 'delete')->name('delete');
    // Route::get('/posts/{post}/edit', 'edit')->name('edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
