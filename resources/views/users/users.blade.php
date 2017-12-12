@extends('layouts.master')

@section('content')
    @foreach ($users as $user)
        <div class="card-space">
            <div class="card" style="padding: 0px">
                <div class="card-header"><a href="/users/{{$user->id}}">{{$user -> name}}</a></div>
                <div class="card-block">
                    <blockquote class="card-blockquote">
                        <ul class="list-inline">
                            <a class="list-inline-item" href="#">
                                <span class="badge badge-default badge-pill">0</span>
                                Games
                            </a>
                            <a class="list-inline-item" href="#">
                                <span class="badge badge-default badge-pill">{{$user -> total_follower}}</span>
                                Followers
                            </a>
                            <a class="list-inline-item" href="#">
                                <span class="badge badge-default badge-pill">{{$user -> total_following}}</span>
                                Follwings
                            </a>
                        </ul>
                        About Me: Dapibus ac facilisis in
                    </blockquote>
                </div>
            </div>
        </div>
    @endforeach
@endsection