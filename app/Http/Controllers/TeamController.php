<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Capsule\Manager as DB;

class TeamController extends Controller
{
    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function index(): View

    {
        $teamName = request()->get('name') ?? 'A';

        $alphabet = Team::selectSub('LEFT(name, 1)', 'name_fl')
            ->orderBy('name_fl')
            ->groupBy('name_fl')
            ->pluck('name_fl')
            ->all();

        $leagues = League::with(['teams' => function($q) use ($teamName){
            $q->where('name', 'LIKE', $teamName . '%');
        }])->get();

        return view('teams', compact('alphabet', 'leagues','teamName'));

    }

    public function show(int $id): View
    {
        $team = Team::find($id);

        if ($team instanceof Team === false) {
            return view('404');
        }

        return view('team', compact('team'));
    }

    public function leaders()
    {

        $leaders = League::with('leaders')
            ->get();

        return view('leaders', compact('leaders'));
    }

    public function league_top()
    {

        $topTeamsGoalsFor = League::with('topTeam')
            ->get()
            ->sortByDesc('topTeam.all_goals_for');

        $topLeaguesGoalsFor = League::select("leagues.*")
            ->selectSub("SUM(all_goals_for)", "goals")
            ->leftJoin("teams", function ($join){
                $join->on("leagues.id", "=", "teams.league_id");
            })
            ->groupBy("leagues.id")
            ->orderByDesc('goals',)
            ->get();

        $topLeaguesGoalsAgainst = League::with('goalsAgainst')
            ->get();

        return view('home',compact('topTeamsGoalsFor','topLeaguesGoalsFor','topLeaguesGoalsAgainst'));

    }

}
