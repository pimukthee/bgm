@extends('layouts.master')

@section('content')

<p class="createEvent" > CREATE EVENT </p>

    <div class="contentBox">
      <form method="post" action="store">
       {{csrf_field()}}
        <div class="form-group">
            <label for="game">Game Name</label>
            <input type="text" class="form-control" id="game" name="game_name" required>
        </div>

        <div class="form-group">
            <label for="event">Event Name</label>
            <input type="text" class="form-control" id="event" name="name" required>
        </div>

         <div class="form-group">    
            <label for="datePicket">Date</label>
            <div class="input-group date">
                <input type="text" class="form-control" id="datePicker" name="start_date" required>
            </div>
            <p id="dateHelpBlock" class="form-text text-muted">
                yyyy-mm-dd hh:mm
            </p>
        </div>

         <div class="form-group">
          <label for="inputdefault">Location</label>
          <input class="form-control" id="inputdefault" type="text" name="location" required>
         </div>

         <div class="form-group">
          <label for="inputdefault">Require ranking</label>
          <input class="form-control" id="inputdefault" type="text" name="min_rank" required>
         </div>

         <div class="form-group">
          <label for="inputdefault">Description</label>
          <input class="form-control" id="inputdefault" type="text" name="description">
         </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>  
   
    </div>
    @include('layouts.errors')
@endsection