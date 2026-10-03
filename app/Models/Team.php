<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'image',
        'description',
        'email',
        'phone',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'status',
        'sort_order',
    ];
}
