@extends('layouts.master')

@section('content')
@if(Auth::check() and $user->name == Auth::user()->name)
<div class="profile-container">
            <div class="profile-header row">
               <div class="col-md-12 col-sm-12 text-center">
                    <img src="http://bootdey.com/img/Content/user_1.jpg" alt="" class="header-avatar">                </div>
                <div class="col-md-12 col-sm-12 profile-info">
                <form method="POST" action="{{ URL::to('/users/' . $user->id . '/update')}}">
                    {{ csrf_field() }}
                    <h1>Edit Profile</h1>
                    <hr>
                    <label for="name">Name: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="registerName" placeholder="Name" name="name" value="{{$user->name}}" required>
                    </div>

                    <label for="exampleFormControlTextarea1">About Me</label>
                    <div class="form-group">
                    <textarea class="form-control" id="about_me" rows="3" name="about_me">{{$user->about_me}}</textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
</div>
@endif
@include('layouts.errors')
@endsection