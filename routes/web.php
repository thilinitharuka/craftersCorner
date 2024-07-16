<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\OrderController;


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

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/admin/product/create', [ProductController::class, 'create']);

Route::post('/admin/product/store',[ProductController::class,'store'])
    ->name('admin.product.store');

Route::get('/admin/product/show',[ProductController::class,'show'])
    ->name('admin.product.show');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
    ->name('products.edit');

Route::put('/products/{product}', [ProductController::class, 'update'])
    ->name('products.update');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])
    ->name('products.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/users/list',[UserController::class,'index'])
    ->name('users.list');

Route::get('/users/{user}/edit',[UserController::class,'edit'])
    ->name('users.edit');

Route::put('/users/{user}', [UserController::class, 'update'])
    ->name('users.update');

Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->name('users.destroy');

Route::get('/admin/category/create', [\App\Http\Controllers\CategoryController::class, 'create']);

Route::post('/admin/category/store',[\App\Http\Controllers\CategoryController::class,'store'])
    ->name('admin.category.store');

Route::get('/admin/category/list',[\App\Http\Controllers\CategoryController::class,'index'])
    ->name('admin.category.list');

//public function edit(string $id) $id == id
Route::get('/category/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])
    ->name('categories.edit');

Route::delete('/category/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])
    ->name('categories.destroy');

Route::put('/category/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])
    ->name('categories.update');

Route::get('/', [IndexController::class, 'index']);


Route::get('/user',[\App\Http\Controllers\AccountController::class,'edit']);

/*Route::get('/user', function () {
    return view('user.userindex');
});*/


//Route::post('/update-account', [AccountController::class, 'updateAccount'])->name('update.account');
Route::put('/update-account/{id}', [AccountController::class, 'updateAccount'])->name('update.account');
Route::get('/user/userindex', [AccountController::class, 'index']);
Route::get('/user/userorder', [OrderController::class, 'index']);

// Display change password form
Route::get('/change-password', [UserController::class, 'showChangePasswordForm'])->name('password.change');

// Handle change password form submission
Route::post('/change-password', [UserController::class, 'changePassword'])->name('password.update');

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'cart'])
    ->name('cart.index');
Route::put('/cart/store', [\App\Http\Controllers\CartController::class, 'store'])
    ->name('cart.store');

