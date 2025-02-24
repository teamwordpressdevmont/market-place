<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Portal\BlogDataController;
use App\Http\Controllers\Portal\testimonialDataController;
use App\Http\Controllers\Portal\CategoryDataController;
use App\Http\Controllers\Portal\TraderPersonDataController;
use App\Http\Controllers\Portal\ContactDataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Redirect to homepage or login
})->name('logout');

// Admin Category
Route::group(['prefix'  => 'categories'], function() {
    Route::get('/', [CategoryDataController::class, 'list'])->name('category.list');
    Route::get('/add', [CategoryDataController::class, 'addEdit'])->name('category.addEdit');
    Route::post('/store', [CategoryDataController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryDataController::class, 'edit'])->name('category.edit');
    Route::put('/update/{id}', [CategoryDataController::class, 'update'])->name('category.update');
    Route::get('/delete/{id}', [CategoryDataController::class, 'destroy'])->name('category.delete');
});

// Admin Blog
Route::group(['prefix'  => 'blog'], function() {
    Route::get('/', [BlogDataController::class, 'list'])->name('blog.list');
    Route::get('/view/{id}', [BlogDataController::class, 'view'])->name('blog.view');
    Route::get('/add', [BlogDataController::class, 'addEdit'])->name('blog.addEdit');
    Route::post('/store', [BlogDataController::class, 'store'])->name('blog.store');
    Route::get('/edit/{id}', [BlogDataController::class, 'edit'])->name('blog.edit');
    Route::put('/update/{id}', [BlogDataController::class, 'update'])->name('blog.update');
    Route::get('/delete/{id}', [BlogDataController::class, 'destroy'])->name('blog.delete');
});

// Admin Testimonial
Route::group(['prefix'  => 'testimonial'], function() {
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

// Admin Blog
Route::group(['prefix'  => 'tradeperson'], function() {
    Route::get('/', [TraderPersonDataController::class, 'list'])->name('tradeperson.list');
    Route::get('/edit/{id}', [TraderPersonDataController::class, 'edit'])->name('testimonial.edit');
    Route::put('/update/{id}', [TraderPersonDataController::class, 'update'])->name('testimonial.update');
    Route::get('/view/{id}', [TraderPersonDataController::class, 'view'])->name('tradeperson.view');
    Route::get('/delete/{id}', [TraderPersonDataController::class, 'destroy'])->name('tradeperson.delete');
});

// Contact
Route::get('/contact', [ContactDataController::class, 'list'])->name('contact');

require __DIR__.'/auth.php';
