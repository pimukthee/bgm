@extends('layouts/master')

@section('content')
        @foreach($recentGames as $recentGame)
            @if (auth()->check() && in_array($recentGame->event_id, $participatedEvents))
                <div class="row card-space">
                    <div class="col-1"></div>
                        <div class="card col-10">
                        <div class="row">
                            <div class="col">
                                <h4><b>EVENT: {{$recentGame->name}}</b></h4>
                                <p>{{$recentGame->description}}</p>
                            </div>
                            <div class="col-md-auto">
                                <h5>DATE : {{$recentGame->start_date}}</h5>
                                <h3>PLACE : {{$recentGame->place}}</h3>
                            </div>
                            <div class="col col-lg-3">
                                
                            </div>
                        </div>
                        </div>
                    <div class="col-1"></div>
                </div>
             @endif
        @endforeach        
@endsection

