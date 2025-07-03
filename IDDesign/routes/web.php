<?php

use App\Http\Controllers\ServiceRequestController;

Route::get('/', function () {
    return view('index');
});

Route::get('/service-request', function () {
    return view('index'); // your form view blade file
})->name('service-request.form');

Route::post('/service-request', [ServiceRequestController::class, 'store'])->name('service-request.store');
