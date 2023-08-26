<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\BookCarController;
use App\Http\Controllers\ContractsController;


// Public
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/show-requests', [BookCarController::class, 'index'])->name('showBookingRequests');
Route::get('/booking-details/{id}', [BookCarController::class, 'showBookingRequestDetails'])->name('showBookingRequestDetails');


// Logged users
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    
    
    // Dashboard User
    Route::get('/dashboard', [BookCarController::class, 'show'])->name('dashboard');
    
    // Data SAVE by form submit
    Route::post('/book-car', [BookCarController::class, 'store'])->name('BookCarControllerStore');
    
    
    // Book A CAR
    Route::get('/book', function () { return view('bookCar');})->name('book');

    // Booking Req Accept
    Route::post('/booking-req-accept', [BookCarController::class, 'bookingReqAcceptByRequester'])->name('bookingReqAcceptByRequester');
});






// Driver
Route::prefix('driver')->middleware(['auth', 'isDriver'])->group(function(){

    Route::get('dashboard', [DriverController::class, 'index'])->name('driver.dashboard');
    Route::get('profile', [DriverController::class, 'profileShow'])->name('driver.profile');
    Route::post('profile-update', [DriverController::class, 'update'])->name('driver.profile.update')->middleware('onlyPost');
    Route::get('profile-status-request', [DriverController::class, 'updateProfileStatusRequest'])->name('driver.profile.update.status.request');
    
    // apply job/bid
    Route::post('apply-contract', [ContractsController::class, 'createContract'])->name('driver.applyContract');

    // Contract Accept by Driver
    Route::post('accept-contract', [ContractsController::class, 'contractAcceptByDriver'])->name('driver.contractAccept');
    
});
 // apply for driver profile
Route::get('driver/apply', [DriverController::class, 'driverApply'])->name('driver.apply')->middleware('auth');
Route::post('driver/applied', [DriverController::class, 'store'])->name('driver.applied')->middleware(['auth', 'onlyPost']);


// Admin
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('driver-profile/{id}', [AdminController::class, 'driverProfile'])->name('admin.driverProfile');
    Route::get('pending-drivers', [AdminController::class, 'pendingDrivers'])->name('admin.pendingDrivers');
});