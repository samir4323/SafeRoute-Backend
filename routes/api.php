<?php

use App\Http\Controllers\Api\VehiculeController;
use Illuminate\Support\Facades\Route;





Route::apiResource("vehicles",VehiculeController::class);

Route::put('/vehicles/{id}/toggle', [VehiculeController::class, 'toggleStatus']);

