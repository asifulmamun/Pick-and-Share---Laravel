<?php

use Illuminate\Support\Facades\Route;



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
