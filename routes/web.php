<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [PublicController::class, 'index'])->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticating']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerProcess']);
});

Route::middleware(['only_admin', 'auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/deleted', [BookController::class, 'listDeletedBooks']);
    Route::get('/books/add', [BookController::class, 'add']);
    Route::post('/books', [BookController::class, 'store']);
    Route::get('/books/edit/{slug}', [BookController::class, 'edit']);
    Route::put('/books/{slug}', [BookController::class, 'update']);
    Route::delete('/books/{slug}', [BookController::class, 'delete']);
    Route::patch('/books/restore/{slug}', [BookController::class, 'restore']);

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/add', [CategoryController::class, 'add']);
    Route::get('/categories/edit/{slug}', [CategoryController::class, 'edit']);
    Route::get('/categories/deleted', [CategoryController::class, 'listDeletedCategory']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{slug}', [CategoryController::class, 'update']);
    Route::delete('/categories/{slug}', [CategoryController::class, 'delete']);
    Route::patch('/categories/restore/{slug}', [CategoryController::class, 'restore']);

    Route::get('/users', [UserController::class, 'activeUser']);
    Route::get('/users/deleted', [UserController::class, 'deletedUser']);
    Route::get('/users/inactive', [UserController::class, 'inactiveUser']);
    Route::patch('/users/allow/{slug}', [UserController::class, 'allowUser']);
    Route::get('/users/{slug}', [UserController::class, 'detailUser']);
    Route::delete('/users/{slug}', [UserController::class, 'deleteUser']);
    Route::patch('/users/restore/{slug}', [UserController::class, 'restore']);

    Route::get('/rents/logs', [RentLogController::class, 'index']);

    Route::get('/rents', [BookRentController::class, 'index']);
    Route::post('/rents', [BookRentController::class, 'store']);
    Route::get('/rents/return', [BookRentController::class, 'indexReturn']);
    Route::post('/rents/return', [BookRentController::class, 'storeReturn']);
    
});
Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/profile', [UserController::class, 'profile'])->middleware('only_client');
