<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'id',
        'info',
    ];

    protected $casts = [
        'info' => 'array'
    ];
}
