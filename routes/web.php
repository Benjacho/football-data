<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/competitions/{id}', 'CompetitionController@getCompetition');
Route::get('/competitions', 'CompetitionController@getCompetitions');
Route::get('/team/{id}', 'TeamsController@getTeam');
Route::get('/team', 'TeamsController@getTeams');
Route::get('/players', 'PlayerController@players');
