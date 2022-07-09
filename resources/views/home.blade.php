@extends('layouts.app')

@section('content')

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="{{asset('img/its_logo.png')}}" alt="..." /></div>
            <div class="col-lg-5">
                <h1 class="font-weight-light">What is in-this-season?</h1>
                <p>It is the six best and most important football leagues in Europe. Basic information about the leagues and statistics of the teams from the current season.</p>
            </div>
        </div>

        <div class="card mb-5 m-auto" style="max-width: max-content;">
        <div class="card-header text-center">
            <h6 class="m-auto">TOP6: The best teams shooting</h6>
        </div>
        <div class="card-body">
            <div class="table-scrollable">
                <table class="table-responsive">
                    <table class="table table-striped table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Group</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col">Logo</th>
                            <th scope="col" class="text-center">Form</th>
                            <th scope="col">Goals</th>
                            <th scope="col">Played</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($topTeamsGoalsFor as $team)
                            <tr>
                                <th scope="row">{{$loop->iteration. "."}}</th>
                                <td class="text-center" ><img class="img-logo" src="{{$team->logo}}" alt=""></td>
                                <td>{{$team->topTeam->name}}</td>
                                <td><img class="img-logo" src="{{$team->topTeam->logo}}" alt=""></td>
                                <td>
                                    @foreach (str_split($team->topTeam->form) as $item)
                                        <span class="badge bg--{{$item}}">{{$item}}</span>
                                    @endforeach
                                </td>
                                <td class="text-center">{{$team->topTeam->all_goals_for}}</td>
                                <td class="text-center">{{$team->topTeam->all_played}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </table>
            </div>

        </div>
    </div>

    <div class="card mb-5 m-auto" style="max-width: max-content;">
        <div class="card-header text-center">
           <h6 class="m-auto">TOP6: Teams most goals lost</h6>
        </div>
        <div class="card-body">
            <div class="table-scrollable">
                <div class="table-responsive">
                    <table class="table table-striped table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Group</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col">Logo</th>
                            <th scope="col" class="text-center">Form</th>
                            <th scope="col">Goals</th>
                            <th scope="col">Played</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($topLeaguesGoalsAgainst as $team)
                            <tr>
                                <th scope="row">{{$loop->iteration. "."}}</th>
                                <td class="text-center" ><img class="img-logo" src="{{$team->logo}}" alt=""></td>
                                <td>{{$team->goalsAgainst->name}}</td>
                                <td><img class="img-logo" src="{{$team->goalsAgainst->logo}}" alt=""></td>
                                <td>
                                    @foreach (str_split($team->goalsAgainst->form) as $item)
                                        <span class="badge bg--{{$item}}">{{$item}}</span>
                                    @endforeach
                                </td>
                                <td class="text-center">{{$team->goalsAgainst->all_goals_against}}</td>
                                <td class="text-center">{{$team->goalsAgainst->all_played}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-5 m-auto" style="max-width: max-content;">
        <div class="card-header text-center">
            <h6 class="m-auto">TOP6: Country with the most goals</h6>
        </div>
        <div class="card-body">
            <div class="table-scrollable">
                <table class="table-responsive">
                    <table class="table table-striped table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Country</th>
                            <th scope="col">Flag</th>
                            <th scope="col" class="text-center">Group</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Goals</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($topLeaguesGoalsFor as $league)
                            <tr>
                                <th scope="row">{{$loop->iteration. "."}}</th>
                                <td>{{$league->country}}</td>
                                <td><img class="img-logo" src="{{$league->flag}}" alt=""></td>
                                <td>{{$league->name}}</td>
                                <td class="text-center"><img class="img-logo" src="{{$league->logo}}" alt=""></td>
                                <td class="text-center">{{$league->goals}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </table>
            </div>
        </div>
    </div>
@endsection
