<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FlyerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MerchandiseController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [ShopController::class, 'index']);
Route::get('/shops/{shop}', [ShopController::class ,'show']);


Route::controller(ShopController::class)->middleware(['auth'])->group(function(){
    Route::get('/mypage/shops', 'index4')->name('index4');
    Route::post('/mypage/shops', 'store')->name('store');
    Route::get('/mypage/shops/create', 'create')->name('create');
    Route::get('/mypage/shops/{shop}', 'show2')->name('show2');
    // Route::delete('/posts/{post}', 'delete')->name('delete');
    Route::get('/mypage/shops/{shop}/edit', 'edit')->name('edit');
    Route::put('/mypage/shops/{shop}', 'update')->name('update');
});

Route::controller(FlyerController::class)->middleware(['auth'])->group(function(){
    Route::get('/mypage/shops/{shop}/edit2', 'edit2')->name('edit2');
    Route::post('/mypage/shops/{shop}', 'update2')->name('update2');
    Route::get('/mypage/shops/{shop}/flyers/{flyer}', 'show3')->name('show3');
    Route::put('/mypage/shops/{shop}/flyers/{flyer}', 'update3')->name('update3');
});

Route::controller(UserController::class)->middleware(['auth'])->group(function(){
    Route::get('/mypage/myflyers', 'index3')->name('index3');
});

Route::controller(MerchandiseController::class)->middleware(['auth'])->group(function(){
    Route::get('/mypage', 'index2')->name('index2');
    Route::get('/mypage/shops/lists/create2', 'create2')->name('create2');
    Route::post('/mypage', 'store2')->name('store2');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
