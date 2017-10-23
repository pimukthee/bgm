@extends('layouts.master')

@section('content')
   
<div class="container">
    <div class="col-md-12">
        <div class="profile-container">
            <div class="profile-header row">
               <div class="col-md-12 col-sm-12 text-center">
                    <img src="http://bootdey.com/img/Content/user_1.jpg" alt="" class="header-avatar">
                </div>

                <div class="col-md-12 col-sm-12 profile-info">
                    <center>

                        <h1>{{$user->name}}</h1>

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

                                <div class="stats-title">FOLLOWING</div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 stats-col">
                                    <div class="stats-value pink">
                                        <h4>{{$user->total_following}}<h4>
                                    </div>
                                <div class="stats-title">FOLLOWERS</div>
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
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <h5>YU_GI_OH</h5>
                                        <h5>1500</h5>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h5>WAREWOLF</h5>
                                    <h5>1800</h5>
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
    </div>
</div>

@endsection