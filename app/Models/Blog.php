<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'content',
        'main_image',
        'gallery_images',
        'tags',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'tags' => 'array',
    ];
}