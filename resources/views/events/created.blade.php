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
                        
                        @if (auth()->check() && $event->has_end == "0")
                            <form method="post" action="/events/{{$event->id}}/end">
                                {{ csrf_field() }}
                                <input type="hidden" name="event_id" value="{{$event->id}}">
                                <button class="btn btn-danger" type="submit">END</button>
                            </form>
                        @else
                            <button class="btn btn-primary" type="submit">END</button>
                        @endif

                        <br>
                        
                        <a href="/events/{{$event->id}}/rank" class="btn btn-primary" role="button" aria-disabled="true">Give Rank</a>

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