<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Blog extends Model
{
   use SoftDeletes; 

    protected $fillable = [
        'title',
        'slug',
        'short_description',
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
