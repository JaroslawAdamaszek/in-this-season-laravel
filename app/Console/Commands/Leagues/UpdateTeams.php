<?php
namespace App\Console\Commands\Leagues;

use App\Models\League;
use App\Models\Team;
use App\Services\JsonServices;
use Illuminate\Console\Command;







class UpdateTeams extends Command
{
    protected $signature = 'leagues:updateTeams';

    protected $description = 'Aktualizacja drużyn danej ligi';

    public function handle()
    {

        $leagues = League::with('teams')->get();

        $leagues->each(function (League $league) {
            $newLeagueData = JsonServices::getJsonData(JsonServices::getUpDateFileJson($league->getKey()));

            foreach ($newLeagueData['standings'][0] as $data) {
                $team = $league->teams
                    ->where('date_api_update', '!=', $data["update"])
                    ->where('team_id', $data['team']['id'])
                    ->first();

                if ($team instanceof Team === false) {
                    continue;
                }
                $team->last_rank = $team->rank;
                $team->rank = $data['rank'];
                $team->logo = $data['team']['logo'];
                $team->name = $data['team']['name'];
                $team->points = $data['points'];
                $team->form = $data['form'];
                $team->all_played = $data['all']['played'];
                $team->all_win = $data['all']['win'];
                $team->all_draw = $data['all']['draw'];
                $team->all_lose = $data['all']['lose'];
                $team->all_goals_for = $data['all']['goals']['for'];
                $team->all_goals_against = $data['all']['goals']['against'];
                $team->save();
            }
        });
    }
}
