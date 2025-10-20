<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ElectricController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\AcLeadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->group(function () {
    Route::apiResource('cars', CarController::class);
    Route::apiResource('electronics', ElectricController::class);
    Route::apiResource('reservations', ReservationController::class);
    Route::apiResource('shipments', ShipmentController::class);
    Route::apiResource('leads', LeadController::class)->only(['index','store']);
    Route::apiResource('ac-leads', AcLeadController::class)->only(['index','store']);
});