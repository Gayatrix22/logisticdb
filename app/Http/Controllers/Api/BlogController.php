<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    // 🔹 All blogs
   public function index()
{
    return response()->json(
        Blog::orderBy('id', 'desc')->get()
    );
}   

    // 🔹 Single blog (IMPORTANT FIX)
    public function show($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json([
                'message' => 'Blog not found'
            ], 404);
        }

        return response()->json($blog);
    }
}