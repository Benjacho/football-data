<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Competition extends Model
{
    protected $fillable = [
        'info'
    ];

    protected $casts = [
        'info' => 'array'
    ];
}
