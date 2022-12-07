<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// after login/register redirect route
Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth:sanctum');

// admin category routes
Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/category', [AdminController::class, 'showcategory']);
    Route::post('/add_category', [AdminController::class, 'add_category']);
    Route::get('/delete_category/{id}', [AdminController::class, 'delete']);
});

// product routes
Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/addproduct', [ProductController::class, 'addproduct']);
    Route::post('/storeproduct', [ProductController::class, 'storeproduct']);
    Route::get('/showproduct', [ProductController::class, 'showproduct']);
    Route::get('/editproduct/{id}', [ProductController::class, 'editproduct']);
    Route::post('/updateproduct/{id}', [ProductController::class, 'updateproduct']);
    Route::get('/deleteproduct/{id}', [ProductController::class, 'deleteproduct']);
});




