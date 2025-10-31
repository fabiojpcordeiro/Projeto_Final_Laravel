<?php

use App\Http\Controllers\Web\CompanyController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'main_landing')->name('main');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/company/first-store', [CompanyController::class, 'firstStore'])->name('first-store');
    route::view('dashboard', 'dashboard')->name('dashboard');
    route::view('profile', 'profile')->name('profile');
    Route::resource('company', CompanyController::class);
});

require __DIR__ . '/auth.php';
