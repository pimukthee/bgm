@extends('layouts.master')

@section('content')
<form method="post" action='/events/{{$event->id}}/end'>
    {{ csrf_field() }}
    @foreach ($users as $user)
    <div class="form-group">
    <label for="{{$user->id}}">{{$user->name}}</label>
        <select class="form-control" id="{{$user->id}}" name="{{$user->name}}">
            @for ($i = 1; $i <= $count; $i++)
                <option>{{ $i }}</option>
            @endfor
        </select>
    </div>
    @endforeach
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection