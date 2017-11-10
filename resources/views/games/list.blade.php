@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="card-deck" style="margin-top: -200px" >
            @foreach($categories as $category)
                <div class="card text-center">
                    <div class="card-block">
                        <h1 class="card-title">{{$category -> game_type}}</h1>
                        @foreach($games as $game)
                            @if($game -> categories_id == $category -> id )
                                <li><a href="/games/{{$game -> id}}">{{$game -> name}}</a></li>
                            @endif 
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>        

@endsection
