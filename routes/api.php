<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ShelterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource(
    'shelters',
    ShelterController::class,
);

Route::apiResource(
    'employees',
    EmployeeController::class,
);

Route::apiResource(
    'cats',
    CatController::class,
);
