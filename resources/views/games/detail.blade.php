@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="profile-container">
            <div class="profile-header row">

                <div class="col-md-2 col-sm-2">
                    <img src="http://bootdey.com/img/Content/user_1.jpg" alt="" class="header-avatar">
                </div>

                <div class="col-md-10 col-sm-10 profile-info">
                    <h1 style="margin: 30px 0px 0px 0px;">{{$game->name}}</h1>
                    <span class="badge badge-pill badge-primary">BOARD</span>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6 ">
                    <h3>TOP 10 Players</h3>
                    <table class="table table-striped">
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
            
                                        <div class = "row">
                                            
                                            <div class="col-4">
                                                <img src="http://bootdey.com/img/Content/user_1.jpg" alt="" class="header-avatar">
                                            </div>

                                            <div class="col-4">
                                                <a href="/users/{{$user->id}}"><h3 style="margin: 30px 0px 0px 0px;">{{$user->name}}</h3></a>
                                                <h4 style="margin: 30px 0px 0px 0px;">{{$user->score}}</h4>
                                            </div>

                                        </div>

                                    </td>
                                </tr>
                            @endforeach    
                        </tbody>
                    </table>
                </div>
        
                <div class="col-md-6 col-sm-6 col-xs-6 ">
                    <div class="form-group">
                        <h3>RULES</h3>
                        <ul>
                            @foreach($rules as $rule)
                                <li>{{$rule}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="form-group">
                        <h3>RANKING RULES</h3>
                        <ul>
                            @foreach($rankingRules as $rule)
                                    <li>{{$rule}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>

        </div>
        
    </div>

@endsection
