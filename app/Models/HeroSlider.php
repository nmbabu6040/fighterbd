<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    protected $fillable = [
        'subtitle',
        'title',
        'description',
        'image',
        'button_text_1',
        'button_link_1',
        'button_text_2',
        'button_link_2',
        'status',
    ];
}
