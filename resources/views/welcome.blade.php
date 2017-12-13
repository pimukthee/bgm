@extends('layouts.master')

@section('content')
  <!-- homepage carousel -->
    <div id="carouselExampleIndicators autocarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./img/game1.jpg" alt="First slide" height="100%">
                    <div class="carousel-caption d-md-block carousel-text">
                      <p style="font-size:40px">Let's play!</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./img/game2.jpg" alt="Second slide" height="100%">
                    <div class="carousel-caption d-md-block carousel-text">
                      <p style="font-size:40px">Let's play!</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>              
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./img/game3.jpg" alt="Third slide" height="100%">
                    <div class="carousel-caption d-md-block carousel-text">
                      <p style="font-size:40px">Let's play!</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
    </div>
  <!-- homepage carousel end -->
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
                          </div>

                      </div>    
              </div>
              <div class="col col-lg-3">
                  <h4><b>Host: {{$event->user->name}}</b></h4>
                  @if (auth()->check() && !in_array($event->id, $participatedEvents))
                              @if (($event->num) < ($event->max_participants))
                                  <form method="post" action="/join/{{$event->id}}">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="event_id" value="{{$event->id}}">
                                      <button class="btn btn-secondary" type="submit">JOIN</button>
                                  </form> 
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
                                  <form method="post" action="/events/cancel/{{$event->id}}">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="event_id" value="{{$event->id}}">
                                      <button class="btn btn-danger" type="submit">CANCEL</button>
                                  </form>
                              @endif
                  <p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p>
              </div>
          </div>
          </div>
      <div class="col-1"></div>
  </div>
  @endforeach
    <div class="card-footer">
        <a href="/events" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">See More</a>
    </div>

  
@endsection



