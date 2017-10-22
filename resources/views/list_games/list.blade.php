@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="card-deck">
            @foreach($categories as $category)
                <div class="card text-center">
                    <div class="card-block">
                        <h4 class="card-title">{{$category -> game_type}}</h4>
                        @foreach($games as $game)
                            @if($game -> categories_id == $category -> id )
                                <h1>{{$game -> name}}</h1>
                            @endif 
                        @endforeach
                    </div>
                    <!-- <div class="card-footer">
                        @Html.ActionLink("Permits", "Index", "Home", new { Area = "Permit" }, new { @class = "btn btn-primary" })
                    </div> -->
                </div>
            @endforeach
        </div>
    </div>        

@endsection
