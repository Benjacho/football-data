<?php

namespace App\Providers;

use App\Library\Services\FootballData;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class FootballServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('football', function () {
            $client = new Client([
                'base_uri'  =>  'http://api.football-data.org/',
                'headers'   =>  [
                    'X-Auth-Token' => '358e2c9e0bd847b69dc87f257e2c37dd'
                ]
            ]);
            return new FootballData($client);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    { }
}
