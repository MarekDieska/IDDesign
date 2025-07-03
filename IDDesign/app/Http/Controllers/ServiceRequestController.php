<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceRequestMail;

class ServiceRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'nullable',
        ]);

        // Sanitize inputs to avoid XSS when displaying later
        $validated['name'] = e($validated['name']);
        $validated['address'] = e($validated['address']);
        if (isset($validated['message'])) {
            $validated['message'] = e($validated['message']);
        }

        foreach (['tepelne_cerpadlo', 'klimatizacia', 'fotovoltika', 'servis', 'nabijacia_stanica', 'ine'] as $field) {
            $validated[$field] = $request->has($field);
        }

        $serviceRequest = ServiceRequest::create($validated);

        Mail::to('viki.laticova@gmail.com')->send(new ServiceRequestMail($serviceRequest));

        return back()->with('success', 'Formulár bol úspešne odoslaný.');
    }
}
