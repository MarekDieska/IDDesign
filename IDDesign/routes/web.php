<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceRequestController;

Route::get('/', function () {
    return view('index');
});


Route::post('/service-requests', [ServiceRequestController::class, 'sendRequest'])
    ->name('service-request.store');

Route::delete('/service-requests/{id}/complete', [ServiceRequestController::class, 'completeTask'])->name('service-requests.complete');

Route::get('login_page', function () {
    Session::forget('errors');
    Session::forget('_old_input');
    return view('auth.login');
})->name('login_page');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [ServiceRequestController::class, 'index'])->name('service-requests.tasks');
    Route::put('/service-requests/{id}/update-message', [ServiceRequestController::class, 'updateMessage'])->name('service-requests.update-message');
    Route::delete('/service-requests/{id}', [ServiceRequestController::class, 'destroy'])->name('service-requests.destroy');
});
