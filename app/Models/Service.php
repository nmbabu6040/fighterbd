<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'service_title',
        'service_title_highlight',
        'service_des',
        'service_icon',
        'service_name',
        'service_description',
        'status',
    ];
}
