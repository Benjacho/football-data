<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Facades\Football;
use App\Team;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;

class CompetitionController extends Controller
{
    public function getCompetition($id)
    {
        $competition = Competition::find($id);

        if ($competition) {
            return response()->json($competition->info);
        } else {
            try {
                $response = Football::getCompetition($id);
                $competition = Competition::create([
                    'id' => $response['id'],
                    'info' => $response,
                ]);
                $teams = Football::getCompetitionTeams($id);
                $this->saveTeams($teams);
                return response()->json($response);
            } catch (ConnectException $e) {
                return response()->json(['message' => $e->getMessage(), 'code' => $e->getCode()]);
            } catch (RequestException $e) {
                return response()->json(['message' => $e->getMessage(), 'code' => $e->getCode()]);
            }
        }
    }

    public function getCompetitions()
    {
        return response()->json(\App\Competition::all()->pluck('info'));
    }

    public function saveTeams($teams)
    {
        foreach ($teams as $team) {
            Team::create([
                'id' => $team->id,
                'info' => $team
            ]);
        }
    }
}
