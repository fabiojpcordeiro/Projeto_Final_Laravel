<?php

use App\Http\Controllers\Api\ApiCandidateController;
use App\Http\Controllers\Api\ApiCompanyController;
use App\Http\Controllers\Api\ApiJobOfferController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/companies-api', ApiCompanyController::class);
Route::apiResource('/candidates-api', ApiCandidateController::class);
Route::apiResource('/job-offers-api', ApiJobOfferController::class);
