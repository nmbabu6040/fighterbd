<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'title',
        'header_logo',
        'footer_logo',
        'favicon',
        'address',
        'phone_1',
        'phone_2',
        'email_1',
        'email_2',
        'about_subtitle',
        'about_title',
        'about_description',
        'about_image',
        'about_button_text',
        'about_button_link',
        'copyright',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'youtube',
        'pinterest',
        'google_analytics',
        'google_tag_manager',
        'copyright',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'google_map_url'
    ];
}
