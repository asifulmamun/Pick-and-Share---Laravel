<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;





Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // Dashboard User
    Route::get('/dashboard', [App\Http\Controllers\BookCarController::class, 'show'])->name('dashboard');
    
    
});


// Book A CAR
Route::get('/book', function () {
        return view('bookCar');
    })
    ->middleware('auth')
    ->name('book');

// Data SAVE by form submit
Route::post('/book-car', [App\Http\Controllers\BookCarController::class, 'store'])->name('BookCarControllerStore');



// Driver
Route::prefix('driver')->middleware(['auth', 'isDriver'])->group(function(){

    Route::get('dashboard', [App\Http\Controllers\DriverController::class, 'index'])->name('driver.dashboard');
    Route::get('profile', [App\Http\Controllers\DriverController::class, 'profileShow'])->name('driver.profile');
    Route::post('profile-update', [App\Http\Controllers\DriverController::class, 'update'])->name('driver.profile.update')->middleware('onlyPost');
    Route::get('profile-status-request', [App\Http\Controllers\DriverController::class, 'updateProfileStatusRequest'])->name('driver.profile.update.status.request');
    

});

 // apply for driver profile
Route::get('driver/apply', [App\Http\Controllers\DriverController::class, 'driverApply'])->name('driver.apply')->middleware('auth');
Route::post('driver/applied', [App\Http\Controllers\DriverController::class, 'store'])->name('driver.applied')->middleware(['auth', 'onlyPost']);


// Admin
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    // Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
});