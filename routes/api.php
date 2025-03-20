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
use App\Models\Testimonial;
use App\Http\Controllers\NotificationApiController;



Route::get('/get-token', [MainController::class, 'getToken']);

Route::middleware('verify_token')->group(function () {

    Route::get('/get-blogs', [PublicApiController::class, 'getBlogs']);
    Route::get('/get-categories', [PublicApiController::class, 'getCategories']);


    Route::get('/get-testimonial', [PublicApiController::class, 'getTestimonials']);
    Route::post('/store-testimonial', [PublicApiController::class, 'storeTestimonial']);

    Route::get('/get-tradeperson', [PublicApiController::class, "getTradePerson"]);
    Route::post('/store-contact', [PublicApiController::class, "storeContact"]);

    Route::get('/get-order', [PublicApiController::class, "getOrder"]);
    Route::get('/get-package', [PublicApiController::class, "getPackage"]);

    Route::get('/search-tradeperson', [PublicApiController::class, 'searchTradePerson']);

    Route::get('/get-report', [MainController::class, 'getReports']);

});


// registration routes
Route::post('/register-tradeperson', [AuthController::class, 'registerTradePerson']);
Route::post('/register-customer', [AuthController::class, 'registerCustomer']);
Route::post('/google-register', [AuthController::class, 'registerGoogle']);


Route::post('/login', [AuthController::class, 'login']);

Route::post('/forget-password', [AuthController::class, 'forgetPasword']);
Route::post('/forget-password/reset-password', [AuthController::class, 'resetPassword']);


Route::middleware('auth:api')->group(function () {

    Route::middleware('role:admin')->group(function () {
        Route::post('/add-report', [MainController::class, 'storeReport']);
    });

    Route::get('/get-notifications', [NotificationApiController::class, 'getNotifications']);
    Route::post('/read-notification', [NotificationApiController::class, 'readNotifications']);

    Route::get('/get-announcements', [MainController::class, 'getAnnouncements']);
    Route::post('/read-announcement', [MainController::class, 'readAnnouncements']);

    Route::middleware('role:customer')->group(function () {
        //orders
        Route::post('/create-order', [CustomerApiController::class, 'createOrder']);
        Route::get('/orders', [CustomerApiController::class, 'getOrders']);

        //reviews
        Route::post('/submit-review', [CustomerApiController::class, 'submitReview']);
        Route::get('/order-reviews', [CustomerApiController::class, 'getReviews']);

        Route::get('/get-customer-order', [CustomerApiController::class, 'getCustomerOrder']);
        Route::get('/get-customer-profile', [CustomerApiController::class, 'getCustomerProfile']);
        Route::patch('/update-customer-profile', [CustomerApiController::class, 'updateCustomerProfile']);

        Route::get('/get-accepted-proposal', [CustomerApiController::class, 'getAcceptedProposal']);

        Route::post('/accept-proposal', [CustomerApiController::class, 'acceptProposal']);
        Route::post('/reject-proposal', [CustomerApiController::class, 'rejectProposal']);

        Route::post('/invite-tradeperson', [CustomerApiController::class, 'storeInvite']);
        Route::get('/get-tradeperson-for-invite', [CustomerApiController::class, 'getTradepersonForInvite']);

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

        Route::get('/get-tradeperson-profile', [TradepersonApiController::class, 'getTradePersonProfile']);
        Route::patch('/update-tradeperson-profile', [TradepersonApiController::class, 'updateTradePerson']);

        Route::get('/get-invites', [TradepersonApiController::class, 'getMyInvites']);

        Route::post('/milestone-completed', [TradepersonApiController::class, 'milestoneCompleted']);
        Route::post('/job-completed', [TradepersonApiController::class, 'jobCompleted']);


    });

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/logout', [AuthController::class, 'logout']);
});



