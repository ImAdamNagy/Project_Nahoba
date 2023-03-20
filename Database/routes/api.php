<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\UserController; 

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/show/{id}', [ProductController::class, 'show']);
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


Route::post('/registration',[UserController::class,'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/user/delete/{id}',[UserController::class,'destroy']);
    Route::put('/user/edit/{id}', [UserController::class, 'update']);
    Route::get('/user/{id}', [UserController::class, 'show']);
});