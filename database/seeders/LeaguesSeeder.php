<?php

namespace Database\Seeders;

use App\Models\League;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Services\JsonServices;

class LeaguesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (JsonServices::getLeaguesId() as $id) {
            $jsonFile = JsonServices::getFileJson($id);
            $jsonData = JsonServices::getJsonData($jsonFile);
            League::create(['id' => $jsonData['id'],
                'name' => $jsonData['name'],
                'country' => $jsonData['country'],
                'logo' => $jsonData['logo'],
                'season' => $jsonData['season'],
                'flag' => $jsonData['flag'],]);
            foreach ($jsonData['standings'][0] as $teamData) {
                Team::create(['team_id'=>$teamData['team']['id'],
                    'group'=>$teamData['group'],
                    'rank' => $teamData['rank'],
                    'last_rank' => $teamData['rank'],
                    'logo' => $teamData['team']['logo'],
                    'name' => $teamData['team']['name'],
                    'points' => $teamData['points'],
                    'form' => $teamData['form'],
                    'all_played' => $teamData['all']['played'],
                    'all_win' => $teamData['all']['win'],
                    'all_draw' => $teamData['all']['draw'],
                    'all_lose' => $teamData['all']['lose'],
                    'all_goals_for' => $teamData['all']['goals']['for'],
                    'all_goals_against' => $teamData['all']['goals']['against'],
                    'date_api_update' => $teamData['update'],
                    'league_id'=> $jsonData['id'],
                ]);
            }
        }
    }
}


