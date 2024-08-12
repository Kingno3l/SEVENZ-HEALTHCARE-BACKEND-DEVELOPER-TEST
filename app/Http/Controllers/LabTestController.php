<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabTestController extends Controller
{
    public function index()
    {
        $labTests = [
            'Chest X-Ray',
            'Cervical Vertebrae X-Ray',
            'Thoracic Vertebrae X-Ray',
            'Legs X-Ray',
        ];

        return response()->json($labTests);
    }
}
