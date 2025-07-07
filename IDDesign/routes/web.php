<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceRequestController;

Route::get('/', function () {
    return view('index');
});

Route::post('/service-requests', [ServiceRequestController::class, 'store'])
    ->name('service-request.store');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [ServiceRequestController::class, 'index'])->name('service-requests.tasks');

    Route::put('/service-requests/{id}/update-message', [ServiceRequestController::class, 'updateMessage'])
        ->name('service-requests.update-message');

    Route::delete('/service-requests/{id}', [ServiceRequestController::class, 'destroy'])
        ->name('service-requests.destroy');
});
