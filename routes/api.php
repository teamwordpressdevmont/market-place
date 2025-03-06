<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogApiController;
use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\CustomerApiController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PublicApiController;
use App\Http\Controllers\TradepersonApiController;



Route::get('/get-token', [MainController::class, 'getToken']);

Route::middleware('verify_token')->group(function () {

    Route::get('/get-blog', [PublicApiController::class, 'getBlogs']);
    Route::get('/get-category', [PublicApiController::class, 'getCategories']);


    Route::get('/get-testimonial', [PublicApiController::class, 'getTestimonials']);
    Route::post('/store-testimonial', [PublicApiController::class, 'storeTestimonial']);

    Route::get('/get-tradeperson', [PublicApiController::class, "getTradePerson"]);
    Route::post('/store-contact', [PublicApiController::class, "storeContact"]);

    Route::get('/get-order', [PublicApiController::class, "getOrder"]);

    Route::post('/store-tradeperson', [MainController::class, 'storeTradePerson']);
});




Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);



Route::middleware('auth:api')->group(function () {

    Route::middleware('role:admin')->group(function () {
        Route::get('/get-report', [MainController::class, 'getReports']);
        Route::post('/add-report', [MainController::class, 'storeReport']);
    });

    Route::middleware('role:customer')->group(function () {
        //orders
        Route::post('/create-order', [CustomerApiController::class, 'createOrder']);
        Route::get('/orders', [CustomerApiController::class, 'getOrders']);

        //reviews
        Route::post('/submit-review', [CustomerApiController::class, 'submitReview']);
        Route::get('/order-reviews', [CustomerApiController::class, 'getReviews']);

        Route::get('/get-customer-order', [MainController::class, 'getCustomerOrder']);
        Route::get('/get-customer-profile', [MainController::class, 'getCustomerProfile']);
        Route::patch('/update-customer-profile', [MainController::class, 'updateCustomerProfile']);

        Route::get('/get-accepted-proposal', [MainController::class, 'getAcceptedProposal']);

        Route::post('/accept-proposal', [MainController::class, 'acceptProposal']);
        Route::post('/reject-proposal', [MainController::class, 'rejectProposal']);



        Route::get('/customer-dashboard', function () {
            return response()->json(['message' => 'Welcome customer']);
        });
    });

    Route::middleware('role:tradeperson')->group(function () {
        
        //order search
        Route::post('/search-orders', [TradepersonApiController::class, 'searchOrders']);
        
        // deactivate account
        Route::post('/delete-account', [TradepersonApiController::class, 'deleteAccount']);
        
        // get reviews
        Route::post('/tradeperson-reviews', [TradepersonApiController::class, 'getTradepersonReviews']);
        
        // get tradeperson orders
        Route::get('/tradeperson-order', [TradepersonApiController::class, 'getTradepersonOrder']);
        
        // submit proposal
        Route::post('/submit-proposal', [TradepersonApiController::class, 'submitProposal']);

        Route::get('/get-tradeperson-profile', [MainController::class, 'getTradePersonProfile']);
        Route::patch('/update-tradeperson-profile', [MainController::class, 'updateTradePerson']);

        Route::get('/tradeperson-dashboard', function () {
            return response()->json(['message' => 'Welcome tradeperson']);
        });
    });

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/logout', [AuthController::class, 'logout']);
});