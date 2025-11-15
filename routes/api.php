<?php

use App\Http\Controllers\Api\ApiCandidateController;
use App\Http\Controllers\api\ApiJobOfferController;
use App\Http\Controllers\Api\ApiApplicationController;
use App\Http\Controllers\Api\ApiLocationController;
use App\Http\Controllers\Api\ApiLogoController;
use App\Http\Controllers\Api\FileController;
use Illuminate\Support\Facades\Route;

Route::post('candidate/register', [ApiCandidateController::class, 'register'])->name('api-register');
Route::post('candidate/login', [ApiCandidateController::class, 'login'])->name('api-login');
Route::get('job-offers/search/', [ApiJobOfferController::class, 'search']);
Route::get('job-offers', [ApiJobOfferController::class, 'index']);
Route::get('job-offers/{job_offer}', [ApiJobOfferController::class, 'show']);
Route::get('states/', [ApiLocationController::class, 'states']);
Route::get('cities/', [ApiLocationController::class, 'cities']);
Route::get('logo/{path}', [FileController::class, 'getLogo'])->where('path', '.*');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/get-photo/{path}', [FileController::class, 'getPhoto'])->where('path', '.*');
    Route::post('/set-photo', [FileController::class, 'setPhoto']);
    Route::get('/get-resume', [FileController::class, 'getResume']);
    Route::post('/set-resume', [FileController::class, 'setResume']);
    Route::post('/candidate/change-password', [ApiCandidateController::class, 'changePassword']);
    Route::get('/candidate/me', [ApiCandidateController::class, 'me'])->name('me');
    Route::apiResource('/application', ApiApplicationController::class);
    Route::apiResource('/candidate', ApiCandidateController::class)->except(['store']);
    Route::post('/candidate/logout', [ApiCandidateController::class, 'logout'])->name('ApiLogout');
});
