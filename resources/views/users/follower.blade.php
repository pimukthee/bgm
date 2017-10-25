@extends('layouts/master')

@section('content')
    <h1>FOLLOWERS</h1>
    @foreach ($followingList as $user)
        <div class="row card-space">
            <div class="col-1"></div>
                <div class="card col-10">
                <div class="row">
                    <div class="col">
                        <li><b> {{$user->name}}</b></li>
                    </div>
                    
                   
                </div>
            </div>
        </div>
    @endforeach
@endsection