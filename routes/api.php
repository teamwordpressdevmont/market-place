<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerApiController;
use App\Http\Controllers\MainController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    
    
    Route::middleware('role:admin')->group(function(){
        Route::get('/get-report', [MainController::class, 'getReports']); 
        Route::post('/add-report', [MainController::class, 'storeReport']);
    
        Route::get('/admin-dashboard', function() {
            return response()->json(['message' => 'Welcome Admin']);
        });
    });

    Route::middleware('role:customer')->group(function(){
        //orders
        Route::post('/create-order', [CustomerApiController::class, 'createOrder']);
        Route::get('/orders', [CustomerApiController::class, 'getOrders']);
        
        Route::get('/customer-dashboard', function() {
            return response()->json(['message' => 'Welcome customer']);
        });
    });
    
    Route::middleware('role:tradeperson')->group(function(){
        Route::get('/tradeperson-dashboard', function() {
            return response()->json(['message' => 'Welcome tradeperson']);
        });
    });
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::get('/logout', [AuthController::class, 'logout']);
});