@extends('layouts/master')

@section('content')
    <h1>INVITE</h1>
    <div class="row card-space">
            <div class="col-1"></div>
            <div class="card col-10">
                <div class="row">
                    <div class="col">
                        <form method="post" action="invited">
                            {{csrf_field()}}
                            @foreach ($following as $user)
                                <div class="form-check form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="{{$user->id}}" id="{{$user->id}}" value="{{$user->id}}">{{$user->name}}
                                    </label>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form> 
            </div>
            </div>
        </div>
    </div>

@endsection