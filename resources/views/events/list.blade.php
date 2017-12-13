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
                    <h5>Recruit: {{($event->max_participants)-($event->number)}} player(s)</h5>
                </div>
                <div class="col-md-auto">
                    <h5>DATE : {{$event->start_date}}</h5>
                        <div class="row">
                            <div class="col-md-11">
                                <p>Required Rank: {{$event->min_rank}}</p>
                                <p>Max participants: {{$event->max_participants}}</p>
                                <a class="btn btn-primary" href="/users/{{auth()->id()}}/invite/{{$event->id}}" role="button">INVITE</a>
                            </div>
                        </div>    
                </div>
                <div class="col col-lg-3">
                    <h4><b>Host: {{$event->user->name}}</b></h4>
                    @if (auth()->check() && !in_array($event->id, $participatedEvents))
                                @if (($event->num) < ($event->max_participants))
                                    @if((auth()->id()) != ($event->user_id))
                                        <form method="post" action="/join/{{$event->id}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="event_id" value="{{$event->id}}">
                                            <button class="btn btn-secondary" type="submit">JOIN</button>
                                        </form>
                                    @endif 
                                @endif    
                                    <form method="get" action="/events/{{$event->id}}/participants">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="event_id" value="{{$event->id}}">
                                        <button class="btn btn-secondary" type="submit">PARTICIPANTS</button>
                                    </form>
                                    @if (auth()->id() == $event->user_id)
                                        <form method="post" action="/events/{{$event->id}}/delete">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="event_id" value="{{$event->id}}">
                                            <button class="btn btn-danger" type="submit">DELETE</button>
                                        </form>
                                    @endif
                                @endif

                                @if (auth()->check() && in_array($event->id, $participatedEvents))
                                    @if((auth()->id()) != ($event->user_id))
                                        <form method="post" action="/events/cancel/{{$event->id}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="event_id" value="{{$event->id}}">
                                            <button class="btn btn-danger" type="submit">CANCEL</button>
                                        </form>
                                    @endif
                                @endif
                    <p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p>
                </div>
            </div>
            </div>
        <div class="col-1"></div>
    </div>
    @endforeach
@endsection