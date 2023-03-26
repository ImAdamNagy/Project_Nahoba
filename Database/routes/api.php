<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\TypeController; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::post('/createproduct', [ProductController::class, 'store']);
Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/destroy/{id}', [ProductController::class, 'destroy']);
    Route::put('/update/{id}', [ProductController::class, 'update']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::get('/transaction/{id}', [TransactionController::class, 'show']);
    Route::post('/newtransaction', [TransactionController::class, 'store']);
    Route::put('/edit/{id}', [TransactionController::class, 'update']);
    Route::delete('/transaction/{id}', [TransactionController::class, 'destroy']);
});

Route::get('/types', [TypeController::class, 'index']);
Route::get('/type/{id}', [TypeController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/newtype', [TypeController::class, 'store']);
    Route::put('/edit/{id}', [TypeController::class, 'update']);
    Route::delete('/type/{id}', [TypeController::class, 'destroy']);
});

Route::post('/login', [UserController::class, 'authenticate']);
Route::get('/logout', [UserController::class, 'logout']);
Route::post('/register',[UserController::class,'store']);
Route::get('/user/{id}', [UserController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/user/delete/{id}',[UserController::class,'destroy']);
    Route::put('/user/edit/{user}', [UserController::class, 'update']);
});