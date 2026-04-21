<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product/{id}', [HomeController::class, 'product'])->name('product');

// Cart Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/add-ajax', [CartController::class, 'addAjax'])->name('cart.add.ajax');
    Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
});

// Order Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');

    Route::post('/orders/{id}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
});



// Admin Routes
//middleware: lớp lọc 2 cái là auth: trạng thái đăng nhập và admin: người quản trị -> lớp bảo mật
//prefix: thêm admin vào tiền tố url
//group: nhóm các route chung admin lại để dễ quản lý
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    //dashboard
    //get: lấy dữ liệu từ server về thông qua địa chỉ /dashboard: đuôi của url, chỉ định AdminController xử lý và chạy hàm dashboard(), name ở đây là biệt danh của route
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    //danh mục
    //lấy toàn bộ danh sách danh mục từ db và hiển thị lên cho người dùng
    Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories');

    //post: gửi dữ liệu lên server
    //nhận dữ liệu từ người dùng nhập vào form và gửi lên server để lưu vào db
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');

    //tìm danh mục có id tương ứng, sau đó hiển thị lên form các thông tin trước khi sửa 
    Route::get('/categories/{id}/edit', [AdminController::class, 'editCategory'])->name('admin.categories.edit');

    //lấy dữ liệu của id từ form mới chỉnh sửa và lưu lại vào db
    Route::put('/categories/{id}', [AdminController::class, 'updateCategory'])->name('admin.categories.update');

    //dùng delete để xóa danh mục có id ra khỏi db
    Route::delete('/categories/{id}', [AdminController::class, 'destroyCategory'])->name('admin.categories.destroy');
    
    //sản phẩm
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::put('/products/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    Route::delete('/products/{id}', [AdminController::class, 'destroyProduct'])->name('admin.products.destroy');
    
    //người dùng
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::delete('/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    
    //đơn hàng
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::put('/orders/{id}', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.update');
    Route::delete('/orders/{id}', [AdminController::class, 'destroy'])->name('admin.orders.destroy');

});



// Auth Routes
require __DIR__.'/auth.php';

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});