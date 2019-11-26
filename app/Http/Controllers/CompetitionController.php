<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompetitionController extends Controller
{

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function competitions()
    { }
}
