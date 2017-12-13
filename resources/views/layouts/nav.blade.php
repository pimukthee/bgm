<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse mb-4">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">BGM</a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/categories">Categories</a>
            </li>
            @if(Auth::check())
                <li class="nav-item">
                <a class="nav-link" href="/events/create">Create event</a>
                </li>          
                <li class="nav-item">
                <a class="nav-link" href="/users/">Users</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/events/created">Created</a>
                </li>
            @endif
        </ul>
        
        <form action="/search" method="POST" role="search" class="form-inline mt-2 mt-md-0">>
            {{ csrf_field() }}
            <input class="form-control mr-sm-2" placeholder="Search" type="text" name="word" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        @if(Auth::check())
            <div class="dropdown">
                <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Notifications <span class="badge">22</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <a class="btn btn-outline-success" href="/logout">Log out</a>
        @else
            <a class="btn btn-outline-success" href="/login">Log in</a>
        @endif
    </div>
</nav>
