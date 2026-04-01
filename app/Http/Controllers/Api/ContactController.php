<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
   public function store(Request $request)
{
      \Log::info('Contact API hit', $request->all());
    try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required|string',
        ]);

        Contact::create($validated);
        return response()->json([
            'status' => true,
            'message' => 'Contact saved successfully'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'error' => $e->getMessage()
        ], 500);
    }
}}