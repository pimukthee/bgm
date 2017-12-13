@extends('layouts.master')

@section('content')
    @foreach ($users as $user)
        <div class="card-space">
            <div class="card" style="padding: 0px">
                <div class="card-header"><a href="/users/{{$user->id}}">{{$user -> name}}</a></div>
                <div class="card-block">
                    <blockquote class="card-blockquote">
                        <ul class="list-inline">
                            <a class="list-inline-item" href="/users/{{$user->id}}/follower">
                                <span class="badge badge-default badge-pill">{{$user -> total_follower}}</span>
                                Followers
                            </a>
                            <a class="list-inline-item" href="/users/{{$user->id}}/following">
                                <span class="badge badge-default badge-pill">{{$user -> total_following}}</span>
                                Followings
                            </a>
                        </ul>
                        About Me: {{$user->about_me}}
                    </blockquote>
                </div>
            </div>
        </div>
    @endforeach
@endsection