<?php

use App\Http\Controllers\Admin\AuthAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Auth\PasswordResetController;





// login logout register
Route::get('login', [AuthController::class, 'showFormLogin']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'showFormRegister']);
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


// quên mật khẩu

Route::get('password/reset', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [PasswordResetController::class, 'reset'])->name('password.update');



// home
Route::get('/', [HomeController::class, 'index'])->name('client.home');
Route::get('/product/detail/{id}', [ProductController::class, 'chiTietSanPham'])->name('products.detail');
Route::get('/list-cart',           [CartController::class, 'listCart'])->name('cart.list');
Route::post('/add-to-cart',        [CartController::class, 'addCart'])->name('cart.add');
Route::post('/update-cart',        [CartController::class, 'updateCart'])->name('cart.update');


Route::middleware('auth')->prefix('donhangs')
    ->as('donhangs.')
    ->group(function () {
        Route::get('/',                 [OrderController::class, 'index'])->name('index');
        Route::get('/create',           [OrderController::class, 'create'])->name('create');
        Route::post('/store',           [OrderController::class, 'store'])->name('store');
        Route::get('/show/{id}',        [OrderController::class, 'show'])->name('show');
        Route::put('{id}/update',       [OrderController::class, 'update'])->name('update');
    });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route Admin
Route::middleware(['auth', 'auth.admin'])->prefix('admins')
    ->as('admins.')
    ->group(function () {

        // trang dashboard
        Route::get('/dashboard', function () {
            return view('admins.dashboard');
        })->name('dashboard');

        // Route tài khoản
        Route::get('/list-tai-khoan', [AuthAdminController::class, 'index'])->name('users.index');
        Route::patch('/admins/users/{id}/update-role', [AuthAdminController::class, 'updateRole'])->name('users.updateRole');
        Route::delete('/admins/users/{id}', [AuthAdminController::class, 'destroy'])->name('users.destroy');

        // route danh mục
        Route::prefix('danhmucs')
            ->as('danhmucs.')
            ->group(function () {
                Route::get('/',                 [DanhMucController::class, 'index'])->name('index');
                Route::get('/create',           [DanhMucController::class, 'create'])->name('create');
                Route::post('/store',           [DanhMucController::class, 'store'])->name('store');
                Route::get('/show/{id}',        [DanhMucController::class, 'show'])->name('show');
                Route::get('{id}/edit',         [DanhMucController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [DanhMucController::class, 'update'])->name('update');
                Route::delete('{id}/destroy',   [DanhMucController::class, 'destroy'])->name('destroy');
            });

        // Route sản phẩm
        Route::prefix('sanphams')
            ->as('sanphams.')
            ->group(function () {
                Route::get('/',                 [SanPhamController::class, 'index'])->name('index');
                Route::get('/create',           [SanPhamController::class, 'create'])->name('create');
                Route::post('/store',           [SanPhamController::class, 'store'])->name('store');
                Route::get('/show/{id}',        [SanPhamController::class, 'show'])->name('show');
                Route::get('{id}/edit',         [SanPhamController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [SanPhamController::class, 'update'])->name('update');
                Route::delete('{id}/destroy',   [SanPhamController::class, 'destroy'])->name('destroy');
            });
        // Route đơn hàng
        Route::prefix('donhangs')
            ->as('donhangs.')
            ->group(function () {
                Route::get('/',                 [DonHangController::class, 'index'])->name('index');
                Route::get('/show/{id}',        [DonHangController::class, 'show'])->name('show');
                Route::put('{id}/update',       [DonHangController::class, 'update'])->name('update');
                Route::delete('{id}/destroy',   [DonHangController::class, 'destroy'])->name('destroy');
            });
    });
