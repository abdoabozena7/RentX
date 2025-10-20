<?php

namespace App\Http\Controllers;

use App\Models\AcLead;
use Illuminate\Http\Request;

class AcLeadController extends Controller
{
    public function index()
    {
        return AcLead::orderByDesc('created_at')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'capacity' => 'nullable|string|max:255',
            'use_case' => 'nullable|string',
        ]);
        $lead = AcLead::create($data);
        return response()->json($lead, 201);
    }
}