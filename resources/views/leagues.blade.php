@extends('layouts.app')

@section('content')

    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7 m-auto text-center">
            <img class="img-fluid rounded mb-4 mb-lg-0 w-75 h-75" src="{{asset('img/leagues_its.png')}}" alt="..." />
        </div>
    </div>

    <div class="card mb-5 m-auto w-50 p-2">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($leagues as $league)
                <div class="col">
                    <div class="card">
                        <div class="league-content text-center m-auto" >
                            <img src="{{$league->logo}}" class="league-img" alt="...">
                        </div>
                        <div class="card-footer text-center">
                            <a class="nav-link" href="{{route('leagues.show', ['id'=>$league->id,'name'=>$league->name])}}">{{$league->name}}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
