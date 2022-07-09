<?php

namespace App\Http\Controllers;


use App\Services\JsonServices;
use App\Models\League;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Capsule\Manager as DB;

class LeagueController extends Controller
{

    public function index(): View
    {
//        DB::connection()->enableQueryLog();
//        Team::get();
//        $ql = DB::getQueryLog();
//        dump($ql);
//        exit;

        $leagues = League::all();
        return view('leagues', compact('leagues'));

    }

    public function show(int $id): View
    {
        $league = League::with(
            ['teams' => function ($q) {
                $q->orderBy('rank');
            }
            ]
        )
            ->find($id);

        if ($league instanceof League === false) {
            return view('404');
        }

        return view('league', compact('league'));

    }

}
