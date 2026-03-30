<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Yaha pe saare API routes define hote hain
|
*/

// Test route (check karne ke liye)
Route::get('/test', function () {
    return response()->json([
        'message' => 'API working successfully ✅'
    ]);
});

// Blogs API (MAIN ROUTE)
Route::get('/blogs', [BlogController::class, 'index']);

Route::get('/blogs/{slug}', [BlogController::class, 'show']);