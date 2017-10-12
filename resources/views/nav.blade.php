<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse mb-4">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">{{$title}}</a>
    <div class="collapse navbar-collapse" id="navbเระ าarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/categories">Categories</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/createevent">CreateEvent</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/profile">Profile</a>
            </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" placeholder="Search" type="text">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#loginModal" id="login">Login</button>
</nav>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginHeader" style="display: block">Login</h5>
                <h5 class="modal-title" id="registerHeader" style="display: none">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="box" style="display: block" id="loginBox">
                    <form>
                        <div class="form-group">
                            <input type="username" class="form-control" id="inputUsername" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                    </form>
                </div>
                <div class="box" style="display: none" id="registerBox">
                    <form>
                        <div class="form-group row">
                            <div class="col-6">
                                <input type="text" class="form-control" id="registerName" placeholder="Name">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" id="reigsterLname" placeholder="Last name">
                            </div>
                        </div>
                        <div class="form-group" id="formRegisterUsername">
                            <input type="username" class="form-control" id="registerUsername" placeholder="Username">
                            <small class="form-text text-muted">Username should not contain whitespace.</small>
                        </div>
                        <div class="form-group" id="formRegisterEmail">
                            <input type="text" class="form-control" id="registerEmail" placeholder="Email">
                            <div class="form-control-feedback" id="warningEmail" style="display: none">Email is not valid</div>
                        </div>
                        <div class="form-group" id="formRegisterPassword">
                            <input type="password" class="form-control" id="registerPassword" placeholder="Password">
                            <small class="form-text text-muted">Password should not contain whitespace.</small>
                        </div>
                        <div class="form-group" id="formRegisterConfirmPassword">
                            <input type="password" class="form-control" id="registerConfirmPassword" placeholder="Confirm Password">
                            <div class="form-control-feedback" id="warningConfirmPassword" style="display: none">Confirmation mismatched.</div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <div class="login-footer" style="display: block" id="loginFooter">
                    <button type="button" class="btn btn-light" id="registerButton">Register</button>
                    <button type="button" class="btn btn-primary" id="loginButton">Login</button>
                </div>
                <div class="register-footer" style="display: none" id="registerFooter">
                    <button type="button" class="btn btn-light" id="confirmRegisterButton">Register</button>
                </div>
            </div>
        </div>
    </div>
</div>