<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'id',
        'info'
    ];

    protected $casts = [
        'info' => 'array',
    ];
}
