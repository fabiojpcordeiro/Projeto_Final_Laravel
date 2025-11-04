<?php

use App\Http\Controllers\Web\CompanyController;
use App\Http\Controllers\Web\JobOfferController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'main_landing')->name('main');

Route::middleware('auth')->group(function () {
    Route::get('/find/{id}', [JobOfferController::class, 'findForCompany'])->name('findForCompany');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/store-company',[CompanyController::class, 'storeCompany'])->name('storeCompany');
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
    Route::resource('company', CompanyController::class);
    Route::resource('job-offers', JobOfferController::class);
});

require __DIR__ . '/auth.php';
