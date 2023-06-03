<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('users.create');
        } else {
            return redirect()->route('products.index');
        }
    })->name('home');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{user}/enable', [UserController::class, 'enable'])->name('users.enable');
    Route::put('/users/{user}/disable', [UserController::class, 'disable'])->name('users.disable');
    Route::put('/users/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');


Route::get('/product-categories', [ProductCategoryController::class, 'index'])->name('product-categories.index');
Route::get('/product-categories/create', [ProductCategoryController::class, 'create'])->name('product-categories.create');
Route::post('/product-categories', [ProductCategoryController::class, 'store'])->name('product-categories.store');
Route::get('/product-categories/{category}/edit', [ProductCategoryController::class, 'edit'])->name('product-categories.edit');
Route::put('/product-categories/{category}', [ProductCategoryController::class, 'update'])->name('product-categories.update');
Route::delete('/product-categories/{category}', [ProductCategoryController::class, 'destroy'])->name('product-categories.destroy');



    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
