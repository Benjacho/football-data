<?php

namespace App\Http\Controllers;

use App\Facades\Football;
use App\Player;
use App\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function getTeam($id)
    {
        $team = Team::find($id);

        if ($team) {
            return response()->json($team->info);
        } else {
            try {
                $teamResponse = Football::getTeam($id);
                $players = $teamResponse['squad'];
                $team = Team::create([
                    'id' => $teamResponse['id'],
                    'info' => $teamResponse,
                ]);
                $this->savePlayers($players);
                return response()->json($teamResponse);
            } catch (ConnectException $e) {
                return response()->json(['message' => $e->getMessage(), 'code' => $e->getCode()]);
            } catch (RequestException $e) {
                return response()->json(['message' => $e->getMessage(), 'code' => $e->getCode()]);
            }
        }
    }

    public function getTeams()
    {
        return response()->json(\App\Team::all()->pluck('info'));
    }

    public function savePlayers($players)
    {
        foreach ($players as $player) {
            Player::create([
                'id' => $player->id,
                'info' => collect($player)->only(['id', 'name', 'position', 'shirtNumber'])
            ]);
        }
    }
}
