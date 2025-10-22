<?php

use App\Http\Controllers\api\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/',[CompanyController::class, 'index']);
