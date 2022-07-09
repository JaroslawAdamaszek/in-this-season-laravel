<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\League;
use App\Models\Table;

class JsonServiceProvider extends ServiceProvider
{

    /*
    public function register()
    {

    }


    public function boot()
    {

    }*/


    public static function getFileJson($id)
    {

        switch ($id) {
            case 39:
                return 'storage/app/json/PremierLeague.json';
            case 106:
                return 'storage/app/json/Ekstraklasa.json';
            case 78:
                return 'storage/app/json/Bundesliga.json';
            case 140;
                return 'storage/app/json/LaLiga.json';
            case 135;
                return 'storage/app/json/SerieA.json';
            case 61;
                return 'storage/app/json/Ligue1.json';
            default:
                header('Location: https://its.lndo.site/home');
                break;
        }

    }


    public static function getJsonData($jsonFile)
    {
        $leaguesJson = file_get_contents($jsonFile);
        $leaguesResponse = json_decode($leaguesJson, true);
        $rawLeagueData = $leaguesResponse;

        foreach ($rawLeagueData['response'] as $data) {
            return $data['league'];
        }
    }


    public static function getTeamStatsFromJson($teamName, $fileJson)
    {
       // $teamStats = [];
        $team = str_replace('+', ' ', $teamName);
        $leagueData = self::getJsonData($fileJson);
        $leagueStandings = Table::createLeagueStandings($leagueData);

        foreach ($leagueStandings->findTeam($team) as $k => $v) {
            $teamStats = $leagueStandings->teams[$k];
        }

        return $teamStats;

    }

    public static function getLeaguesHeadersFromJson(): array
    {
        $headers = [];

        foreach (League::getLeaguesId() as $id) {
            $jsonFile = self::getFileJson($id);
            $leaguesData = self::getJsonData($jsonFile);
            array_push($headers, League::createLeagueHeaders($leaguesData));
        }
        return $headers;
    }

    public static function createLeagueLeadersFromJson(): array
    {
        $leaders = [];

        foreach (League::getLeaguesId() as $id) {
            $jsonFile = self::getFileJson($id);
            $leagueData = self::getJsonData($jsonFile);
            $leagueStandings = Table::createLeagueStandings($leagueData);
            array_push($leaders, $leagueStandings->findLeader());
        }

        return $leaders;
    }




}
