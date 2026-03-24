<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'image',
        'images',
        'category',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}