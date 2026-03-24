<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\GalleryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('galleries', GalleryController::class);
Route::post('/gallery', [GalleryController::class, 'store']);
Route::get('/gallery', [GalleryController::class, 'index']);