<?php

use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('admins.dashboard');
});



Route::get('login', [AuthController::class, 'showFormLogin']);
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('register', [AuthController::class, 'showFormRegister']);
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/home', function () {
//     return view('home');
// })->middleware();

// Route::get('/admin', function (){
//     return 'đây là trang admin';
// })->middleware(['auth','auth.admin']);

Route::get('/product/detail/{id}',[ProductController::class,'chiTietSanPham'])->name('products.detal');
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Admin
Route::middleware(['auth', 'auth.admin'])->prefix('admins')
    ->as('admins.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admins.dashboard');
        })->name('dashboard');

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

    });
