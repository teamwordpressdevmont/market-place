<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Portal\BlogDataController;
use App\Http\Controllers\Portal\testimonialDataController;
use App\Http\Controllers\Portal\CategoryDataController;
use App\Http\Controllers\Portal\TraderPersonDataController;
use App\Http\Controllers\Portal\ContactDataController;
use App\Http\Controllers\Portal\PackageController;
use App\Http\Controllers\Portal\ReportController;
use App\Http\Controllers\Portal\jobListingDataController;
use App\Http\Controllers\Portal\AdminMainController;
use App\Http\Controllers\Portal\PendingApprovalController;
use App\Http\Controllers\Portal\AnnouncementController;
use App\Http\Controllers\Portal\CustomerController;
use App\Http\Controllers\Portal\SubscriptionController;
use App\Http\Controllers\Portal\TradePersonServiceController;





Route::get('/', function () {
    return view('welcome');
});

Route::get('/pending-approval', [PendingApprovalController::class, 'list'])->name('pending-approval');


Route::get('/dashview', function() {
    return view('dashview');
})->name('dashview');

Route::get('/job-post', function() {
    return view('job-post');
})->name('job-post');

Route::get('/job-post-two', function() {
    return view('job-post-two');
})->name('job-post-two');

Route::get('/job-post-three', function() {
    return view('job-post-three');
})->name('job-post-three');

Route::get('/job-post-four', function() {
    return view('job-post-four');
})->name('job-post-four');

Route::get('/job-management', function() {
    return view('job-management');
})->name('job-management');

// Route::get('/violation-client', function() { return view('violation-client');})->name('violation-client');

Route::get('/subscription-plans', function() {
    return view('subscription-plans');
})->name('subscription-plans');



// Route::get('/job-proposal', function() {
//     return view('job-proposal');
// })->name('job-proposal');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ReportController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Redirect to homepage or login
})->name('logout');


// Announcement
Route::group(['prefix' => 'announcement', 'middleware' => 'auth'], function () {
    Route::get('/', [AnnouncementController::class, 'list'])->name('announcement.list');
    Route::get('/add', [AnnouncementController::class, 'addEdit'])->name('announcement.addEdit');
    Route::post('/store', [AnnouncementController::class, 'store'])->name('announcement.store');
    Route::get('/edit/{id}', [AnnouncementController::class, 'edit'])->name('announcement.edit');
    Route::put('/update/{id}', [AnnouncementController::class, 'update'])->name('announcement.update');
    Route::get('/delete/{id}', [AnnouncementController::class, 'destroy'])->name('announcement.delete');
});

// Admin Category
Route::group(['prefix' => 'categories', 'middleware' => 'auth'], function () {
    Route::get('/', [CategoryDataController::class, 'list'])->name('category.list');
    Route::get('/add', [CategoryDataController::class, 'addEdit'])->name('category.addEdit');
    Route::post('/store', [CategoryDataController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryDataController::class, 'edit'])->name('category.edit');
    Route::put('/update/{id}', [CategoryDataController::class, 'update'])->name('category.update');
    Route::get('/delete/{id}', [CategoryDataController::class, 'destroy'])->name('category.delete');
});

// Admin Blog
Route::group(['prefix' => 'blog', 'middleware' => 'auth'], function () {
    Route::get('/', [BlogDataController::class, 'list'])->name('blog.list');
    Route::get('/view/{id}', [BlogDataController::class, 'view'])->name('blog.view');
    Route::get('/add', [BlogDataController::class, 'addEdit'])->name('blog.addEdit');
    Route::post('/store', [BlogDataController::class, 'store'])->name('blog.store');
    Route::get('/edit/{id}', [BlogDataController::class, 'edit'])->name('blog.edit');
    Route::put('/update/{id}', [BlogDataController::class, 'update'])->name('blog.update');
    Route::get('/delete/{id}', [BlogDataController::class, 'destroy'])->name('blog.delete');
});

// Admin Testimonial
Route::group(['prefix'  => 'testimonial', 'middleware' => 'auth'], function() {
    Route::get('/', [testimonialDataController::class, 'list'])->name('testimonial.list');
    Route::get('/view/{id}', [testimonialDataController::class, 'view'])->name('testimonial.view');
    Route::get('/add', [testimonialDataController::class, 'addEdit'])->name('testimonial.addEdit');
    Route::post('/store', [testimonialDataController::class, 'store'])->name('testimonial.store');
    Route::get('/edit/{id}', [testimonialDataController::class, 'edit'])->name('testimonial.edit');
    Route::put('/update/{id}', [testimonialDataController::class, 'update'])->name('testimonial.update');
    Route::get('/delete/{id}', [testimonialDataController::class, 'destroy'])->name('testimonial.delete');

    // Toggle Approval Route
    Route::post('/toggle-approval/{id}', [testimonialDataController::class, 'toggleApproval'])->name('testimonial.toggleApproval');
});

// Admin Trade Person
Route::group(['prefix'  => 'tradeperson', 'middleware' => 'auth'], function() {
    Route::get('/', [TraderPersonDataController::class, 'list'])->name('tradeperson.list');
    Route::post('/store', [TraderPersonDataController::class, 'store'])->name('tradeperson.store');
    Route::get('/edit/{id}', [TraderPersonDataController::class, 'edit'])->name('tradeperson.edit');
    Route::put('/update/{id}', [TraderPersonDataController::class, 'update'])->name('tradeperson.update');
    Route::get('/view/{id}', [TraderPersonDataController::class, 'view'])->name('tradeperson.view');
    Route::get('/delete/{id}', [TraderPersonDataController::class, 'destroy'])->name('tradeperson.delete');
    Route::post('/tradeperson-toggle-approval/{id}', [TraderPersonDataController::class, 'tradepersonToggleApproval'])
    ->name('tradeperson.tradepersonToggleApproval');

});


// Admin Trade Person Service
Route::group(['prefix'  => 'tradeperson-service', 'middleware' => 'auth'], function() {
    Route::get('/', [TradePersonServiceController::class, 'list'])->name('tradeperson-service.list');
    Route::get('/add', [TradePersonServiceController::class, 'addEdit'])->name('tradeperson-service.addEdit');
    Route::post('/store', [TradePersonServiceController::class, 'store'])->name('tradeperson-service.store');
    Route::get('/edit/{id}', [TradePersonServiceController::class, 'edit'])->name('tradeperson-service.edit');
    Route::put('/update/{id}', [TradePersonServiceController::class, 'update'])->name('tradeperson-service.update');
    Route::get('/view/{id}', [TradePersonServiceController::class, 'view'])->name('tradeperson-service.view');
    Route::get('/delete/{id}', [TradePersonServiceController::class, 'destroy'])->name('tradeperson-service.delete');

});

// Admin Job Listing
Route::group(['prefix'  => 'joblisting', 'middleware' => 'auth'], function() {
    Route::get('/', [jobListingDataController::class, 'list'])->name('joblisting.list');
    Route::post('/store', [jobListingDataController::class, 'store'])->name('joblisting.store');
    Route::get('/edit/{id}', [jobListingDataController::class, 'edit'])->name('joblisting.edit');
    Route::put('/update/{id}', [jobListingDataController::class, 'update'])->name('joblisting.update');
    Route::get('/view/{id}', [jobListingDataController::class, 'view'])->name('joblisting.view');
    Route::get('/review-profile/{id}', [jobListingDataController::class, 'reviewProfile'])->name('joblisting.review-profile');
    Route::get('/delete/{id}', [jobListingDataController::class, 'destroy'])->name('joblisting.delete');

    Route::get('/violation-client/{id}', [jobListingDataController::class, 'violationClient'])->name('joblisting.violation-client');
    
});

// Contact
Route::get('/contact', [ContactDataController::class, 'list'])->name('contact');


// Admin package
Route::group(['prefix'  => 'package', 'middleware' => 'auth'], function() {
    Route::get('/', [PackageController::class, 'list'])->name('package.list');
    Route::get('/add', [PackageController::class, 'addEdit'])->name('package.addEdit');
    Route::post('/store', [PackageController::class, 'store'])->name('package.store');
    Route::get('/edit/{id}', [PackageController::class, 'edit'])->name('package.edit');
    Route::put('/update/{id}', [PackageController::class, 'update'])->name('package.update');
    Route::get('/delete/{id}', [PackageController::class, 'destroy'])->name('package.delete');
});


// Admin customer
Route::group(['prefix'  => 'customer', 'middleware' => 'auth'], function() {
    Route::get('/', [CustomerController::class, 'list'])->name('customer.list');
    Route::get('/add', [CustomerController::class, 'addEdit'])->name('customer.addEdit');
    Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
});

// Subscription
Route::group(['prefix'  => 'subscription', 'middleware' => 'auth'], function() {
    Route::get('/', [SubscriptionController::class, 'list'])->name('subscription.list');
    Route::get('/add', [SubscriptionController::class, 'addEdit'])->name('subscription.addEdit');
    Route::post('/store', [SubscriptionController::class, 'store'])->name('subscription.store');
    Route::get('/edit/{id}', [SubscriptionController::class, 'edit'])->name('subscription.edit');
    Route::put('/update/{id}', [SubscriptionController::class, 'update'])->name('subscription.update');
    Route::get('/delete/{id}', [SubscriptionController::class, 'destroy'])->name('subscription.delete');
});

// Report


//json file
Route::get('/json', [AdminMainController::class, 'showJsonContent'])->name('json.show');
Route::post('/json/create', [AdminMainController::class, 'createJsonFile'])->name('json.create');
Route::post('/json/save', [AdminMainController::class, 'updateJsonFile'])->name('json.save');


Route::post('/user/{id}/toggle-approval', [TraderPersonDataController::class, 'toggleUserApproval'])->name('user.toggleApproval');
Route::get('/accept-review/{id}' , [jobListingDataController::class, 'acceptReview'])->name('accept.review');


require __DIR__.'/auth.php';
