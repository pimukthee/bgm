@extends('layouts.master')

@section('content')
    <div class="profile-container">
        <div class="profile-header row">
            <div class="col-md-12 col-sm-12 text-center">
                <img src="http://bootdey.com/img/Content/user_1.jpg" alt="" class="header-avatar">
            </div>

            <div class="col-md-12 col-sm-12 profile-info">
                <center>

                    <h1>{{$user->name}}</h1>
                    @if(Auth::check() and $user->name != Auth::user()->name)
                        <form method="post" action="/users/{{$user->id}}/follow">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <button class="btn btn-secondary" type="submit">Follow</button>
                        </form>
                    @endif

                    @if(Auth::check() and $user->name == Auth::user()->name)
                        <a href="/users/{{$user->id}}/edit" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">edit</a>
                    @endif

                    <br>
                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12 stats-col">
                                <div class="stats-value pink">
                                    <h4>{{$user->total_follower}}<h4>
                                </div>

                            <a href="/users/{{$user->id}}/followers"><div class="stats-title">FOLLOWERS</div></a>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 stats-col">
                                <div class="stats-value pink">
                                    <h4>{{$user->total_following}}<h4>
                                </div>
                            <a href="/users/{{$user->id}}/following"><div class="stats-title">FOLLOWINGS</div></a>
                        </div>
                    </div>
                </center>
                
                <br>

                <div class="col-md-12 col-sm-12 col-xs-12 ">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 space">
                            <h4>ABOUT ME</h4>
                            <p>{{$user->about_me}}<p>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 space">
                            <h4>RANKING</h4>
                            <div class="row">
                            @foreach ($ranks as $rank)
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <h5>{{$rank->name}}</h5>
                                    <h5>{{$rank->score}}</h5>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 space">
                    <h4>LATEST COMPETITIONS</h4>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <h6>EVEVNT: AAAAA </h6>
                            <h6>DATE: XX/XXXXX/XXX </h6>
                            <h6>LOCATION: Lorem ipsum, dolor sit amet consectetur </h6>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <h5>WITH</h5>
                            <li>jlsafkjasdhf</li>
                            <li>jlsafkjasdhf</li>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <h5>RESULT</h5>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection