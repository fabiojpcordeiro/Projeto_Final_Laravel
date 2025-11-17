<?php

use App\Http\Controllers\Api\ApiCandidateController;
use App\Http\Controllers\api\ApiJobOfferController;
use App\Http\Controllers\Api\ApiApplicationController;
use Illuminate\Support\Facades\Route;

Route::post('candidate/register', [ApiCandidateController::class, 'register'])->name('api-register');
Route::post('candidate/login', [ApiCandidateController::class, 'login'])->name('api-login');
Route::get('job-offers/search/', [ApiJobOfferController::class, 'search']);
Route::get('job-offers', [ApiJobOfferController::class, 'index']);
Route::get('job-offers/{job_offer}', [ApiJobOfferController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/candidate/me', [ApiCandidateController::class, 'me'])->name('me');
    Route::apiResource('/application', ApiApplicationController::class);
    Route::apiResource('/candidate', ApiCandidateController::class)->except(['store']);
    Route::post('/candidate/logout', [ApiCandidateController::class, 'logout'])->name('logout');
});
