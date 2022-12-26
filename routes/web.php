<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;


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
// homwcontroller routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/product_details/{id}', [HomeController::class, 'product_details']);

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
Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth:sanctum', 'verified');


Route::middleware(['auth:sanctum'])->group(function(){

    /*-------------- Admin Routes -----------------*/

    // admin category routes
    Route::get('/category', [AdminController::class, 'showcategory']);
    Route::post('/add_category', [AdminController::class, 'add_category']);
    Route::get('/delete_category/{id}', [AdminController::class, 'delete']);

    // admin product routes
    Route::get('/addproduct', [ProductController::class, 'addproduct']);
    Route::post('/storeproduct', [ProductController::class, 'storeproduct']);
    Route::get('/showproduct', [ProductController::class, 'showproduct']);
    Route::get('/editproduct/{id}', [ProductController::class, 'editproduct']);
    Route::post('/updateproduct/{id}', [ProductController::class, 'updateproduct']);
    Route::get('/deleteproduct/{id}', [ProductController::class, 'deleteproduct']);

    // admin orders route
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/delivered/{id}', [OrderController::class, 'delivery_status']);
    Route::get('/print_pdf/{id}', [OrderController::class, 'print_pdf']);
    Route::get('/mail/{id}', [OrderController::class, 'mail']);
    Route::post('/create_mail/{id}', [OrderController::class, 'create_mail']);
    Route::get('/search_order', [OrderController::class, 'search_order']);


    /*----------------- Ecommerce Routes --------------*/

    // cart routes
    Route::post('/add_cart/{id}', [CartController::class, 'add_cart']);
    Route::get('/show_cart', [CartController::class, 'show_cart']);
    Route::get('/delete_cart/{id}', [CartController::class, 'delete_cart']);

    // order routes
    Route::get('/cod', [OrderController::class, 'cash_on_delivery']);


    // payment routes
    Route::get('/cardpay/{totalprice}', [PaymentController::class, 'index']);
    Route::post('/stripe-payment/{totalprice}', [PaymentController::class, 'payment'])->name('stripe.payment');
});










