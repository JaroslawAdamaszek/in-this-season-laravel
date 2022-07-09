@extends('layouts.app')

@section('content')

    <div class="card mb-3 m-auto my-5" style="max-width: 540px;">
        <div class="row g-0 w-auto d-flex">
            <div class="col-md-3  m-auto">
                <img src="{{$league->logo}}" class="img-fluid rounded-start d-flex m-auto" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <td>{{$league->name}}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{$league->country}}</td>
                            </tr>
                            <th>Flag</th>
                            <td><img style="width: 25px; height: 25px;" src="{{$league->flag}}" alt=""></td>
                            <tr>
                                <th>Season</th>
                                <td>{{$league->season}}</td>
                            </tr>
                            </thead>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-5 m-auto" style="max-width: max-content;">
    <div class="card-body">
        <div class="table-scrollable">
            <table class="table-responsive">
                <table class="table table-striped table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">p.</th>
                        <th scope="col">Logo</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col">Points</th>
                        <th scope="col" class="text-center">Form</th>
                        {{--                <th scope="col">Points</th>--}}
                        <th scope="col">Played</th>
                        <th scope="col">Goals</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($league->teams as $team)
                        <tr>
                            <th scope="row">{{$loop->iteration. "."}}</th>
                            <td>
                                @if($team->diffInRank === 0)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-align-end" viewBox="0 0 16 16">
                                        <path d="M13 7a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7z"/>
                                    </svg>
                                @elseif($team->diffInRank > 0)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                        <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                    </svg>
                                <span style="font-size: 12px;">{{"+".$team->diffInRank}}</span>
                                @elseif($team->diffInRank < 0)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                    <span style="font-size: 12px;">{{$team->diffInRank}}</span>
                                @endif
                            </td>
                            <td class="text-center"><img class="img-logo" src="{{$team->logo}}" alt=""></td>
                            <td>{{$team->name}}</td>
                            <td class="text-center">{{$team->points}}</td>
                            <td>
                                @foreach (str_split($team->form) as $item)
                                    <span class="badge bg--{{$item}}">{{$item}}</span>
                                @endforeach
                            </td>
                            {{--                    <td class="text-center">{{$team->topTeam->points}}</td>--}}
                            <td class="text-center">{{$team->all_played}}</td>
                            <td class="text-center">{{$team->all_goals_for.'-'.$team->all_goals_against}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </table>
        </div>
    </div>
    </div>
@endsection






