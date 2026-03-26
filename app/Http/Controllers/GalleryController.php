<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
{
    return Gallery::latest()->get()->map(function ($item) {
        return [
            'id' => $item->id,
            'category' => $item->category,
            'image' => asset('storage/' . $item->image),
        ];
    });
}
    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        'category' => 'nullable|string'
    ]);

    $imagePath = $request->file('image')->store('gallery', 'public');

    Gallery::create([
        'image' => $imagePath,
        'category' => $request->category
    ]);

   return back()->with('success', 'Image uploaded successfully');
}
}
