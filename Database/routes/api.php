<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\TypeController; 
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\FileController;

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


Route::prefix("users")->group(function (){
    Route::get('/{user}', [UserController::class, 'show'])->whereNumber("user");
    Route::middleware('auth:sanctum')->group(function () {
        Route::delete('/{user}',[UserController::class,'destroy'])->whereNumber("user");
        Route::patch('/{user}', [UserController::class, 'update'])->whereNumber("user");
    });
});


Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/register',[UserController::class,'store']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [UserController::class, 'logout']);
});

Route::prefix("roles")->group(function (){
    Route::get('/', [RoleController::class, 'indexwithoutadmin']);
    Route::get('/{role}', [RoleController::class, 'show'])->whereNumber("role");
});


Route::prefix("products")->group(function (){
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{product}', [ProductController::class, 'show'])->whereNumber("product");
    Route::get('/enable', [ProductController::class, 'enable']);
    Route::get('/userproducts/{id}', [ProductController::class, 'userproducts'])->whereNumber("id");
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/', [ProductController::class, 'store']);
        Route::delete('/{product}', [ProductController::class, 'destroy'])->whereNumber("product");
        Route::patch('/{product}', [ProductController::class, 'update'])->whereNumber("product");
        Route::patch('/enable/{product}', [ProductController::class, 'updateEnable'])->whereNumber("product");
        Route::get('/disable', [ProductController::class, 'disable']);
    });
});


Route::prefix("types")->group(function (){
    Route::get('/', [TypeController::class, 'index']);
    Route::get('/{type}', [TypeController::class, 'show'])->whereNumber("type");
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/', [TypeController::class, 'store']);
        Route::put('/{type}', [TypeController::class, 'update'])->whereNumber("type");
        Route::delete('/{type}', [TypeController::class, 'destroy'])->whereNumber("type");
    });
});

Route::prefix("mechanics")->group(function (){
    Route::get('/', [MechanicController::class, 'index']);
    Route::get('/{id}', [MechanicController::class, 'show'])->whereNumber("id");
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/', [MechanicController::class, 'store']);
        Route::put('/{mechanic}', [MechanicController::class, 'update'])->whereNumber("mechanic");
        Route::delete('/{id}', [MechanicController::class, 'destroy'])->whereNumber("id");
    });
});

Route::middleware(['auth:sanctum'])->prefix('chats')->group(function () {
    Route::get('/', [ChatController::class, 'index']);
    Route::get('/{chat}', [ChatController::class, 'show'])->whereNumber("chat");
    Route::post('/', [ChatController::class, 'store']);
    Route::delete('/', [ChatController::class, 'destroy']);
});


    

