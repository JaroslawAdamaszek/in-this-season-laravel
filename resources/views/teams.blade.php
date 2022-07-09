@extends('layouts.app')

@section('content')
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7 m-auto text-center">
            <img class="img-fluid rounded mb-4 mb-lg-0 w-75 h-75" src="{{asset('img/teams_its.png')}}" alt="..." />
        </div>
    </div>

    <div class="card mb-5 h-50 w-50 m-auto p-2 my-5 p-2">
        <div class="row m-auto g-2 align-items-center">
        @foreach($alphabet as $letter)
                <div class="col" style="margin-left: 9px; margin-right: 9px; margin-bottom: 3px;">
                    <div class="card text-center" style="height: 30px; width: 30px;">
                        <h5>
                            <a href="teams?name={{$letter}}" class="text-decoration-none link-secondary">{{$letter}}</a>
                        </h5>
                        </div>
                </div>
        @endforeach
            </div>
    </div>

    <div class="card mb-5 m-auto" style="max-width: max-content;">
        <div class="card-header text-center">
            <h6 class="m-auto">{{$teamName}}</h6>
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
                            <th scope="col">Points</th>
                            <th scope="col" class="text-center">Form</th>
                            <th scope="col">Played</th>
                            <th scope="col">Goals</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leagues as $teams)
                            @foreach($teams->teams as $team)
                            <tr>
                                <th scope="row">{{$loop->iteration. "."}}</th>
                                <td class="text-center" ><img class="img-logo" src="{{$teams->logo}}" alt=""></td>
                                <td>{{$team->name}}</td>
                                <td><img class="img-logo" src="{{$team->logo}}" alt=""></td>
                                <td class="text-center">{{$team->points}}</td>
                                <td>
                                    @foreach (str_split($team->form) as $item)
                                        <span class="badge bg--{{$item}}">{{$item}}</span>
                                    @endforeach
                                </td>
                                <td class="text-center">{{$team->all_goals_for}}</td>
                                <td class="text-center">{{$team->all_goals_for.'-'.$team->all_goals_against}}</td>
                            </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </table>
            </div>
        </div>
    </div>
@endsection
