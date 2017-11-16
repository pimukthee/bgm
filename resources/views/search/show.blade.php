@extends('layouts/master')

@section('content')
    <h1>RESULTS</h1>
    @foreach ($users as $user)
        <div class="row card-space">
            <div class="col-1"></div>
                <div class="card col-10">
                <div class="row">
                    <div class="col">
                        <li><a href="/users/{{$user->id}}"><b> {{$user->name}}</b></a></li>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($events as $event)
        <div class="row card-space">
            <div class="col-1"></div>
                <div class="card col-10">
                <div class="row">
                    <div class="col">
                        <li><a href="/events"><b> {{$event->name}}</b></a></li>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection