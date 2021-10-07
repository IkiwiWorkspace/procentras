<?php

use Illuminate\Support\Facades\Route;

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


// Route::get('/photo', function () {
//     return view('shop.photo');
// });
Route::get('/photo{id}', [App\Http\Controllers\ImageUploadController::class, 'index'])->name('photo');



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kontaktai', [App\Http\Controllers\HomeController::class, 'getContact'])->name('contact');
Route::get('/produktas/{id}', [App\Http\Controllers\HomeController::class, 'getProduct'])->name('product');
Route::get('/paslaugos/{id}', [App\Http\Controllers\HomeController::class, 'getServices'])->name('services');
// Route::get('/builder{id}', [App\Http\Controllers\ImageUploadController::class, 'getPhotoBuilder'])->name('builder');
Route::get('/builder-photolarge{id}', [App\Http\Controllers\HomeController::class, 'getBuilder'])->name('photolarge');
Route::get('/builder-photocanvas{id}', [App\Http\Controllers\HomeController::class, 'getBuilder2'])->name('photoCanvas');
Route::get('/builder-tradicines{id}', [App\Http\Controllers\HomeController::class, 'getBuilder1'])->name('builder');
Route::post('/builder/store', [App\Http\Controllers\ImageUploadController::class, 'store'])->name('builder.store');
Route::post('/builder/storeMedia', [App\Http\Controllers\ImageUploadController::class, 'storeMedia'])->name('builder.storeMedia');
Route::post('/builder/delete', [App\Http\Controllers\ImageUploadController::class, 'destroy'])->name('builder.destroy');
Route::get('/i-krepseli/{id}', [App\Http\Controllers\ProductsController::class, 'getAddToCart'])->name('product.addToCart');
Route::get('/krepselis', [App\Http\Controllers\HomeController::class, 'getCart'])->name('cart');
Route::get('/parduotuve', [\App\Http\Controllers\HomeController::class, 'getShop'])->name('shop');
Route::get('/mazinti/{id}', [App\Http\Controllers\ProductsController::class, 'getReduceByOne'])->name('cart.reduce');
Route::get('/didinti/{id}', [App\Http\Controllers\ProductsController::class, 'getIncreseByOne'])->name('cart.increase');
Route::get('/pasalinti/{id}', [App\Http\Controllers\ProductsController::class, 'getRemoveItem'])->name('cart.remove');
Route::get('/krepselis/apmokejimas', [App\Http\Controllers\HomeController::class, 'getCheckout'])->name('checkout');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin', 'namespace' => 'Admin'], function() {
    Route::get('/', [\App\Http\Controllers\Admin\PageController::class, 'index'])->name('dashboard');
    Route::get('/create', [\App\Http\Controllers\Admin\PageController::class, 'getCreateProduct'])->name('create.product');
    Route::get('/products', [\App\Http\Controllers\Admin\PageController::class, 'getProducts'])->name('get.product');
    Route::post('/product/create', [\App\Http\Controllers\Admin\ProductsController::class, 'createProduct'])->name('product.create');
    Route::get('/create-category', [\App\Http\Controllers\Admin\PageController::class, 'getCreateCategory'])->name('category.create');
    Route::get('/categories', [\App\Http\Controllers\Admin\PageController::class, 'getCategories'])->name('get.categories');
    Route::post('/create-category/create', [\App\Http\Controllers\Admin\CategoriesController::class, 'createCategory'])->name('create.category');
    Route::delete('/categories/delete/{id}', [\App\Http\Controllers\Admin\CategoriesController::class, 'deleteCategory'])->name('category.delete');
    Route::delete('/products/delete/{id}', [\App\Http\Controllers\Admin\ProductsController::class, 'deleteProduct'])->name('product.delete');
    Route::get('/products/edit/{id}', [\App\Http\Controllers\Admin\PageController::class, 'getEditProduct'])->name('product.edit');
    Route::post('/products/edit/{id}/update', [\App\Http\Controllers\Admin\ProductsController::class, 'updateProduct'])->name('submit.product.edit');
    Route::get('/users', [App\Http\Controllers\Admin\PageController::class, 'getUsers'])->name('users');
    Route::delete('/users/delete/{id}', [\App\Http\Controllers\Admin\UsersController::class, 'deleteUser'])->name('user.delete');
    Route::get('/user/create', [App\Http\Controllers\Admin\UsersController::class, 'getCreateUser'])->name('user.create');
    Route::post('/user/create/submit', [App\Http\Controllers\Admin\UsersController::class, 'createUser'])->name('user.create.submit');
    Route::get('/users/edit/{id}', [App\Http\Controllers\Admin\UsersController::class, 'getEditUser'])->name('user.edit');
    Route::post('/users/edit/{id}/submit', [App\Http\Controllers\Admin\UsersController::class, 'editUser'])->name('user.edit.submit');
    Route::get('/variations', [\App\Http\Controllers\Admin\VariationsController::class, 'index'])->name('get.variations');
    Route::post('/variations', [\App\Http\Controllers\Admin\VariationsController::class, 'createVariation'])->name('variation.create');
    Route::post('/variation/values', [\App\Http\Controllers\Admin\VariationsController::class, 'addValues'])->name('add.values');
    Route::post('/variation/product', [\App\Http\Controllers\Admin\VariationsController::class, 'addVariationToProduct'])->name('add.variations');
    Route::get('/variations/edit', [\App\Http\Controllers\Admin\VariationsController::class, 'getEditVariations'])->name('get.variations.edit');
    Route::delete('/variations/delete/{id}', [\App\Http\Controllers\Admin\VariationsController::class, 'deleteVariation'])->name('variation.delete');
    Route::get('/variations/edit/{id}', [\App\Http\Controllers\Admin\VariationsController::class, 'getEditVariation'])->name('get.edit.variation');
    Route::delete('/variation/value/delete/{variation_id}/{value_id}', [\App\Http\Controllers\Admin\ValuesController::class, 'valueDelete'])->name('delete.value');
    Route::post('/variation/edit/{id}', [\App\Http\Controllers\Admin\VariationsController::class, 'editVariation'])->name('variation.edit');
    Route::get('/variation/edit/value/{id}', [\App\Http\Controllers\Admin\ValuesController::class, 'getEditValue'])->name('get.edit.value');
    Route::post('/value/edit/{id}', [\App\Http\Controllers\Admin\ValuesController::class, 'editValue'])->name('value.edit');
});

Route::group(['prefix' => 'vartotojas', 'as' => 'user.', 'middleware' => 'auth'], function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/kontaktai', [App\Http\Controllers\HomeController::class, 'getContact'])->name('contact');
    Route::get('/profilis', [App\Http\Controllers\HomeController::class, 'getProfile'])->name('profile');
    Route::get('/krepselis', [App\Http\Controllers\HomeController::class, 'getCart'])->name('cart');
});