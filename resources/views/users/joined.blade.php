@extends('layouts/master')

@section('content')
    @foreach ($events as $event)
    <div class="row card-space">
        <div class="col-1"></div>
            <div class="card col-10">
            <div class="row">
                <div class="col">
                    <h4><b>EVENT: {{$event->name}}</b></h4>
                    <p>{{$event->description}}</p>
                    <h5>Location: {{$event->location}}</h5>
                </div>
                <div class="col-md-auto">
                    <h5>DATE : {{$event->start_date}}</h5>
                        <div class="row">
                    </div>    
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection