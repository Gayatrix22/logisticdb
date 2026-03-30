<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\GalleryController;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

Route::get('/galleries', function () {
    return Gallery::latest()->get()->map(function ($item) {
        return [
            'id' => $item->id,
            'category' => $item->category,
            'description' => $item->description,
            'image' => asset('storage/' . $item->image),
        ];
    });
});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/contact', [ContactController::class, 'store']);

use App\Http\Controllers\Api\BlogController;

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{slug}', [BlogController::class, 'show']);





