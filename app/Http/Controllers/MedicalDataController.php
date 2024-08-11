<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalDataController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'username' => 'required|string',
            'lab_results' => 'required|array',
            // Add other necessary validations
        ]);

        // Structure the data and send it via email
        Mail::send('emails.medical_data', $validatedData, function ($message) use ($validatedData) {
            $message->to('peopleoperations@kompletecare.com')
                ->subject("{$validatedData['username']} medical data");
        });

        return response()->json(['message' => 'Medical data submitted successfully.']);
    }
}
