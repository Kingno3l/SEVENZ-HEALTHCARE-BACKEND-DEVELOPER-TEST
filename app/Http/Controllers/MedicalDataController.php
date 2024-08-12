<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Exception;

class MedicalDataController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Get the username of the currently authenticated user
            $username = Auth::user()->username;

            // Validate the incoming request data
            $validatedData = $request->validate([
                'xray' => 'array|nullable',
                'ultrasound' => 'array|nullable',
                'ct_scan' => 'string|nullable',
                'mri' => 'string|nullable',
            ]);

            // Prepare the email data
            $emailData = [
                'username' => $username,
                'xray' => $validatedData['xray'] ?? [],
                'ultrasound' => $validatedData['ultrasound'] ?? [],
                'ct_scan' => $validatedData['ct_scan'] ?? 'N/A',
                'mri' => $validatedData['mri'] ?? 'N/A',
            ];

            // Structure the data and send it via email
            Mail::send('emails.medical_data', $emailData, function ($message) use ($username) {
                $message->to('gibelsoft@gmail.com')
                    ->subject("{$username} medical data");
            });

            return response()->json(['message' => 'Medical data submitted successfully.']);
        } catch (Exception $e) {
            // Log the error message
            Log::error('Failed to send medical data: ' . $e->getMessage());

            // Return a response indicating the failure
            return response()->json(['error' => 'Failed to submit medical data'], 500);
        }
    }
}
