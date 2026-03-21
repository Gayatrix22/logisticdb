<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $contact = Contact::create([
            'name' => $request->name,
            'company' => $request->company,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Saved successfully',
            'data' => $contact
        ]);
    }
}