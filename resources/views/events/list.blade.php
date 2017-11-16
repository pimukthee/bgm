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
                    </div>
                    <div class="col-md-auto">
                        <h5>DATE : {{$event->start_date}}</h5>
                        @if (auth()->check() && !in_array($event->id, $participatedEvents))
                            <form method="post" action="/join/{{$event->id}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="event_id" value="{{$event->id}}">
                                <button class="btn btn-secondary" type="submit">JOIN</button>
                            </form> 
                            <form method="get" action="/events/{{$event->id}}/participants">
                                {{ csrf_field() }}
                                <input type="hidden" name="event_id" value="{{$event->id}}">
                                <button class="btn btn-secondary" type="submit">PARTICIPANTS</button>
                            </form>
                            <form method="post" action="/events/delete">
                                {{ csrf_field() }}
                                <input type="hidden" name="event_id" value="{{$event->id}}">
                                <button class="btn btn-danger" type="submit">DELETE</button>
                            </form>
                        @endif

                        @if (auth()->check() && in_array($event->id, $participatedEvents))
                            <form method="post" action="/events/cancel/{{$event->id}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="event_id" value="{{$event->id}}">
                                <button class="btn btn-danger" type="submit">CANCEL</button>
                            </form>
                        @endif
                    </div>
                    <div class="col col-lg-3">
                        <h4><b>{{$event->user->name}}</b></h4>
                        <p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p>
                    </div>
                </div>
                </div>
            <div class="col-1"></div>
        </div>
    @endforeach
@endsection