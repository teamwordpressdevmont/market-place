<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    
    
    Route::middleware('role:admin')->group(function(){
        Route::get('/admin-dashboard', function() {
            return response()->json(['message' => 'Welcome Admin']);
        });
    });

    Route::middleware('role:customer')->group(function(){
        Route::get('/customer-dashboard', function() {
            return response()->json(['message' => 'Welcome customer']);
        });
    });
    
    Route::middleware('role:contractor')->group(function(){
        Route::get('/contractor-dashboard', function() {
            return response()->json(['message' => 'Welcome contractor']);
        });
    });
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::get('/logout', [AuthController::class, 'logout']);
});