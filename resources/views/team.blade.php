@extends('layouts.app')

@section('content')
    <div class="team_content">
        <div class="team_logo">
            <img src="{{$team->logo}}">
        </div>
        <div class="team_information">
            <table>
                <tr>
                    <th>rank:</th>
                    <td>{{$team->rank}}</td>
                </tr>
                <tr>
                    <th>name:</th>
                    <td>{{$team->name}}</td>
                </tr>
                <tr>
                    <th>group:</th>
                    <td>{{$team->group}}</td>
                </tr>
                <tr>
                    <th>id:</th>
                    <td>{{$team->team_id}}</td>
                </tr>
                <tr>
                    <th>points:</th>
                    <td>{{$team->points}}</td>
                </tr>
                <tr>
                    <th>form:</th>
                    <td class="box">
                        @foreach (str_split($team->form) as $item)
                        <span class='form--{{ $item}}'>{{$item}}</span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>goals:</th>
                    <td>{{$team->all_goals_for}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
