<?php

use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\TripController;
use App\Http\Controllers\Api\VehiculeController;
use Illuminate\Support\Facades\Route;





Route::apiResource("vehicles",VehiculeController::class);

Route::put('/vehicles/{id}/toggle', [VehiculeController::class, 'toggleStatus']);

Route::apiResource("trips",TripController::class);

Route::apiResource("drivers",DriverController::class);

Route::put("/trips/{id}/complete",[TripController::class,"complete"]);
