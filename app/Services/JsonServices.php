<?php

namespace App\Services;

class JsonServices {


    public static function getFileJson($id)
    {

        switch ($id) {
            case 39:
                return file_get_contents(base_path('storage/json_update/premier_league_new_update.json'));
            case 106:
                return file_get_contents(base_path('storage/json_update/ekstraklasa_new_update.json'));
            case 78:
                return file_get_contents(base_path('storage/json_update/bundesliga_new_update.json'));
            case 140;
                return file_get_contents(base_path('storage/json_update/la_liga_new_update.json'));
            case 135;
                return file_get_contents(base_path('storage/json_update/serie_a_new_update.json'));
            case 61;
                return file_get_contents(base_path('storage/json_update/ligue_1_new_update.json'));
            default:
                header('Location: https://its.lndo.site/home');
                break;
        }

    }

    public static function getUpDateFileJson($id)
    {

        switch ($id) {
            case 39:
                return file_get_contents(base_path('storage/json_end_season/PremierLeague_end_season.json'));
            case 106:
                return file_get_contents(base_path('storage/json_end_season/Ekstraklasa_end_season.json'));
            case 78:
                return file_get_contents(base_path('storage/json_end_season/Bundesliga_end_season.json'));
            case 140;
                return file_get_contents(base_path('storage/json_end_season/LaLiga_end_season.json'));
            case 135;
                return file_get_contents(base_path('storage/json_end_season/SerieA_end_season.json'));
            case 61;
                return file_get_contents(base_path('storage/json_end_season/Ligue1_end_season.json'));
            default:
                header('Location: https://its.lndo.site/home');
                break;
        }

    }

    public static function getLeaguesId(): array
    {
        return [106, 39, 78, 61, 135, 140];
    }


    public static function getJsonData($jsonFile)
    {
        $leaguesResponse = json_decode($jsonFile, true);
        $rawLeagueData = $leaguesResponse;

        foreach ($rawLeagueData['response'] as $data) {
            return $data['league'];
        }
    }


    public static function getUpDateDate($jsonData){

        foreach ($jsonData['standings'][0] as $data) {
            return $data['update'];
        }

    }

}
