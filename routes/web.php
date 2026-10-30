<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistrationController;

Route::get('/registration', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('/registration', [RegistrationController::class, 'store'])
    ->middleware('throttle:5,1')   // max 5 submissions per minute per visitor (anti-spam)
    ->name('registration.store');
Route::get('/registration/sent', [RegistrationController::class, 'sent'])->name('registration.sent');
Route::get('/registration/confirm/{token}', [RegistrationController::class, 'confirm'])->name('registration.confirm');