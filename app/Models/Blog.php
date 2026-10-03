<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'icon_image',
        'content',
        'author',
        'published_at',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'published_at' => 'date',
    ];
}
