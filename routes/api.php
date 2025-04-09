<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/productslist', [ProductController::class, 'index']);
    Route::post('/addproducts', [ProductController::class, 'store']);
    Route::get('/productsedit/{id}', [ProductController::class, 'edit']);
    Route::put('/productsupdate/{id}', [ProductController::class, 'update']);
    Route::delete('/productsdelet/{id}', [ProductController::class, 'destroy']);
});
