<?php

use App\Http\Controllers\VacationRequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('vacation-requests')->controller(VacationRequestController::class)->group(function () {
    Route::get('/{employee_id}', 'getEmployeeRequests');
    Route::post('/{employee_id}', 'createRequest');
});
