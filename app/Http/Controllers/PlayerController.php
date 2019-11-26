<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function players()
    {
        return response()->json(\App\Player::all()->pluck('info'));
    }
}
