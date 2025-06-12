<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;

// define web routes for the application.
Route::resource('events', EventController::class);
Route::resource('users', UserController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authentication routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Show registration form
Route::get('events/{id}/register', [EventController::class, 'showRegistrationForm'])->name('events.registerForm');

// Handle registration submission
Route::post('events/{id}/register', [EventController::class, 'registerUser'])->name('events.register');

// Show list of registered users
Route::get('events/{id}/registrations', [EventController::class, 'showRegistrations'])->name('events.showRegistrations');

// Include authentication routes
require __DIR__ . '/auth.php';
