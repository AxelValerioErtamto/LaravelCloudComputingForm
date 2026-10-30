<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

// Homepage goes straight to the registration form
Route::redirect('/', '/registration');

// Cloud Computing 2025 registration
Route::get('/registration', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('/registration', [RegistrationController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('registration.store');
Route::get('/registration/sent', [RegistrationController::class, 'sent'])->name('registration.sent');
Route::get('/registration/confirm/{token}', [RegistrationController::class, 'confirm'])->name('registration.confirm');