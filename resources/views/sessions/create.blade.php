@extends('layouts.master')

@section('content') 
    <div class="col-md-8">
        <h1> Sign In </h1>
        <form action="/login" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Log in</button>
            <a href="/register" aria-pressed="true"> (I don't have an account.)</a>
        </form>
    </div>
@endsection