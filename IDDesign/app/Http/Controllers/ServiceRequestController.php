<?php

namespace App\Http\Controllers;

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

    public function index(Request $request)
    {
        $query = \App\Models\ServiceRequest::query();

        $filterFields = [
            'tepelne_cerpadlo',
            'klimatizacia',
            'fotovoltika',
            'servis',
            'nabijacia_stanica',
            'ine',
        ];

        $query->where(function ($q) use ($request, $filterFields) {
            $hasAny = false;

            foreach ($filterFields as $field) {
                if ($request->boolean($field)) {
                    $q->orWhere($field, true);
                    $hasAny = true;
                }
            }

            if (!$hasAny) {
                $q->orWhereRaw('1=1');
            }
        });

        $requests = $query->get();

        return view('components.tasks', compact('requests'));
    }

    public function updateMessage(Request $request, $id)
    {
        $request->validate(['message' => 'nullable|string']);
        $record = ServiceRequest::findOrFail($id);
        $record->message = e($request->message);
        $record->save();

        return response()->json(['success' => true]);
    }

    public function completeTask($id)
    {
        $request = ServiceRequest::findOrFail($id);
        $request->delete();

        return redirect()->route('service-requests.tasks')->with('success', 'Záznam bol dokončený.');
    }
}
