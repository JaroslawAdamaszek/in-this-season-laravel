@extends('layouts.app')


@section('content')

    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7 m-auto text-center">
            <img class="img-fluid rounded mb-4 mb-lg-0 w-75 h-75" src="{{asset('img/leaders_its.png')}}" alt="..." />
        </div>
    </div>

    <div class="card mb-5 m-auto" style="max-width: max-content;">
        <div class="card-header text-center">
            <h6 class="m-auto">League leaders</h6>
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
                            <th scope="col">Points</th>
                            <th scope="col" class="text-center">Form</th>
                            <th scope="col">Played</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leaders as $team)
                            <tr>
                                <th scope="row">{{$loop->iteration. "."}}</th>
                                <td  class="text-center"><img class="img-logo" src="{{$team->logo}}" alt=""></td>
                                <td>{{$team->leaders->name}}</td>
                                <td  class="text-center"><img class="img-logo" src="{{$team->leaders->logo}}" alt=""></td>
                                <td class="text-center">{{$team->leaders->points}}</td>
                                <td>
                                    @foreach (str_split($team->leaders->form) as $item)
                                        <span class="badge bg--{{$item}}">{{$item}}</span>
                                    @endforeach
                                </td>
                                <td class="text-center">{{$team->leaders->all_played}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


