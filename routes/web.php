<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::prefix('books')->group(function(){
    Route::get('/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/store', [BookController::class, 'store'])->name('books.store');
    Route::get('/{book}', [BookController::class, 'show'])->name('books.show');
    Route::get('/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::patch('/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});
Route::prefix('auth')->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/store', [AuthController::class, 'store'])->name('auth.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::prefix('admin')->group(function(){
    Route::get('/', function(){
        return redirect('/admin/dashboard');
    });
    Route::get('/dashboard', [AdminDashboardController::class, 'show'])->name('admin.dashboard');
    Route::prefix('roles')->group(function(){
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::patch('/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });
    Route::prefix('permission')->group(function(){
        Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
        Route::post('/store', [PermissionController::class, 'store'])->name('permission.store');
        Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::patch('/{permission}', [PermissionController::class, 'update'])->name('permission.update');
        Route::delete('/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy');
    });
    Route::get('/setting', [UserController::class, 'index'])->name('users.index');
});
