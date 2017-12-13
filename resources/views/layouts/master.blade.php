<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       
        <link href="/css/app.css" rel="stylesheet" type="text/css"/>
        <link href="/css/profile.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="/node_modules/owl.carousel/dist/assets/owl.carousel.min.css" />
        <link rel="stylesheet" href="/bower_components/owl.carousel/dist/assets/owl.carousel.min.css" />

        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src="/node_modules/jquery/dist/jquery.js"></script>
        <script src="/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
        <script src="/bower_components/jquery/dist/jquery.js"></script>
        <script src="/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
        <script type="text/javascript" src="{{ app('url')->asset('js/scripts.js') }}"></script>
    </head>
    <body>
        @include('layouts.nav')

        @if ($flash = session('logout_message'))
            <div class="alert alert-danger" role="alert" id="flash-message">
                {{$flash}}
            </div>
        @endif

        @if ($flash = session('login_message'))
            <div class="alert alert-success" role="alert" id="flash-message">
                {{$flash}}
            </div>
        @endif

        <div class="container-fluid">
            @yield('content')
        </div>
    </body>
</html>