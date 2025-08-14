<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Frontend\CarController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\RentalController;
use Illuminate\Support\Facades\Route;
// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Frontend routes
Route::get('/', [PageController::class, 'home'])->name('frontend.home');
Route::get('/about', [PageController::class, 'about'])->name('frontend.about');
Route::get('/rentals', [PageController::class, 'rentals'])->name('frontend.rentals');
Route::get('/contact', [PageController::class, 'contact'])->name('frontend.contact');
Route::get('/cars', [CarController::class, 'index'])->name('frontend.cars.index');
Route::get('/cars/{id}', [CarController::class, 'show'])->name('frontend.cars.show');

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::post('/cars/{carId}/book', [RentalController::class, 'book'])->name('frontend.rentals.book');
    Route::get('/my-bookings', [RentalController::class, 'myBookings'])->name('frontend.rentals.myBookings');
    Route::post('/rentals/{rentalId}/cancel', [RentalController::class, 'cancel'])->name('frontend.rentals.cancel');
});

// Admin routes
// Admin authentication routes
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminCarController::class, 'dashboard'])->name('dashboard');
    Route::resource('cars', AdminCarController::class);
    Route::resource('rentals', AdminRentalController::class);
    Route::resource('customers', CustomerController::class);
    Route::get('customers/{id}/rental-history', [CustomerController::class, 'rentalHistory'])->name('customers.rentalHistory');
});

// Route::get('/', function () {
//     return view('welcome');
// });
