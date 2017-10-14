@extends('layouts.master')

@section('content') 
    <form method="POST" action="/register">
        {{ csrf_field() }}

        <h1>REGISTER</h1>

        <hr>

        <label for="name">Name: </label>
        <div class="form-group">
            <input type="text" class="form-control" id="registerName" placeholder="Name" name="name">
        </div>

        <label for="username">Username:</label>
        <div class="form-group">
            <input type="username" class="form-control" id="username" placeholder="Username" name="username">
        </div>

        <label for="email">Email: </label>
        <div class="form-group">
            <input type="text" class="form-control" id="email" placeholder="Email" name="email">
        </div>

        <label for="password">Password: </label>
        <div class="form-group">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>

        <label for="password_confirmation">Password Confirmation: </label>
        <div class="form-group">
            <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
        </div>


        <button class="btn btn-primary" type="submit">Register</button>
    </form>
@endsection