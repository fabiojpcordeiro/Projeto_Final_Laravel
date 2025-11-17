<?php

use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Web\ApplicationController;
use App\Http\Controllers\Web\CompanyController;
use App\Http\Controllers\Web\JobOfferController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'main_landing')->name('main');

Route::middleware('auth')->group(function () {
    //HOME
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/search', [HomeController::class, 'search'])->name('home.search');
    
    //RESUME DOWNLOADS
    Route::get('jobs/{job_offer_id}/candidate/{candidate_id}/resume', [FileController::class, 'downloadResume'])->name('resume.download');
    Route::get('resume/{candidate}', [FileController::class, 'viewResume'])->name('resume.view');

    //CUSTOM ROUTES
    Route::get('/get-candidates/{id}', [JobOfferController::class, 'getCandidatesByOffer'])->name('getCandidatesByOffer');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::patch('applications/{job_offer_id}/updateStatus', [ApplicationController::class, 'updateStatus'])->name('updateStatus');
    Route::post('/store-company', [CompanyController::class, 'storeCompany'])->name('storeCompany');

    //Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');

    //RESOURCE ROUTES
    Route::resource('job-offers', JobOfferController::class);
    Route::resource('company', CompanyController::class);
});

require __DIR__ . '/auth.php';
