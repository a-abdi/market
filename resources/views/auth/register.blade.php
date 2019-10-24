@extends('layouts.mainregister')
@section('content')

<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="http://192.168.43.83:81">
                    Home
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="http://192.168.43.83:81/login">Login</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="http://192.168.43.83:81/register">Register</a>
                            </li>
                    </ul>
                </div>
            </div>
    </nav>
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Register
                        </div>
                        <div class="card-boy">
                            <form action="/register" method="post">
                                @csrf
                                <div class="form-group row justify-content-around">
                                    <div class="col-sm-5 col-11 my-1">
                                        <input type="text" name="frist-name" class="form-control" placeholder="Frist Name" required>
                                    </div> 
                                    <div class="col-sm-5 col-11 my-1">   
                                        <input type="text" name="last-name" class="form-control" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-sm-5 col-11 my-1">
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div> 
                                    <div class="col-sm-5 col-11 my-1">
                                        <input type="tel" name="phone-number" class="form-control" placeholder="Phone Number" pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required>                   

                                    </div> 
                                    <div class="col-sm-5 col-11 my-1">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div> 
                                    <div class="col-sm-5 col-11 my-1">   
                                        <input type="password" name="password-confirm" class="form-control" placeholder="Password Confirm" required>
                                    </div>                                    
                                    <div class="col-11 my-1 text-center">   
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </div>  
                                </div>
                            </form>
                            <div class="row justify-content-center">
                                <div class="col-11">
                                    @if(@isset($login_res))
                                        @if($login_res['status'])
                                            <div class="alert alert-success">
                                                {{$login_res['ms']}}
                                            </div>
                                        @else
                                            <div class="alert alert-danger">
                                                {{$login_res['ms']}}
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </main>
</div>
@endsection