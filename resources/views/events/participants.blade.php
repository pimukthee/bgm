@extends('layouts.master')

@section('content')
    <div class="col-1"> <h1>PARTICIPANTS</h1></div>
   
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
    
@endsection