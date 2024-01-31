<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyViewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\landlordController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;

// Route::get('/', function () {
//     return view('welcome');
//     // return view('userView.rooms');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/', [PropertyViewController::class, 'index'])->name('userView.index');

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/your/profile', [ProfileController::class, 'show'])->name('profile.show');
});


//admin routing
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dash', [AdminController::class, 'index'])->name('adminView.index');
    Route::post('/properties/{property}/approve', [AdminController::class, 'approve'])->name('adminView.approve');
    Route::post('/properties/{property}/reject', [AdminController::class, 'reject'])->name('adminView.reject');

    //category route
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');
});


//landlord routing
Route::middleware(['auth', 'landlord'])->group(function () {
    Route::get('/property', [LandlordController::class, 'index'])->name('landlordView.index');
    Route::get('/property/create', [LandlordController::class, 'create'])->name('landlordView.create');
    Route::post('/property', [LandlordController::class, 'store'])->name('landlordView.store');
    Route::get('/property/{property}/edit', [LandlordController::class, 'edit'])->name('landlordView.edit');
    Route::put('/property/{property}', [LandlordController::class, 'update'])->name('landlordView.update');
    Route::delete('/property/{property}/destroy', [LandlordController::class, 'destroy'])->name('landlordView.destroy');
    Route::get('/property/status', [LandlordController::class, 'status'])->name('landlordView.status');
    Route::get('/search', [LandlordController::class, 'search'])->name('search');
});


//user routing
// Route::middleware(['auth'])->group(function () {
//     Route::get('/rooms', [PropertyViewController::class, 'index'])->name('userView.index');
//     Route::get('/rooms/{id}', [PropertyViewController::class, 'show'])->name('userView.show');
// });

Route::get('/rooms', [PropertyViewController::class, 'index'])->name('userView.index');
Route::get('/rooms/{id}', [PropertyViewController::class, 'show'])->name('userView.show');
// Route::get('/rooms', [PropertyViewController::class, 'filter'])->name('userView.filter');


//rating route
Route::middleware(['auth'])->group(function () {
    Route::get('/rating', [RatingController::class, 'index'])->name('rating.index');
    Route::get('/rating/{id}/create', [RatingController::class, 'create'])->name('rating.create');
    Route::post('/rating', [RatingController::class, 'store'])->name('rating.store');
});


require __DIR__.'/auth.php';
