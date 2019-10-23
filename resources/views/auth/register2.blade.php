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
                                <a class="nav-link" href="http://192.168.43.83:81/login1">Login</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="http://192.168.43.83:81/register1">Register</a>
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
                            Register <br>
                            <small>welcome to store moradi konde</small>
                        </div>
                        <div class="card-boy">
                            <form action="" method="post">
                                @csrf
                                <div class="form-group row justify-content-around">
                                    <div class="col-sm-5 my-1">
                                        <input type="text" name="frist-name" class="form-control" placeholder="Frist Name">
                                    </div> 
                                    <div class="col-sm-5 my-1">   
                                        <input type="text" name="last-name" class="form-control" placeholder="Last Name">
                                    </div>
                                    <div class="col-sm-11 my-1">
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div> 
                                    <div class="col-sm-5 my-1">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div> 
                                    <div class="col-sm-5 my-1">   
                                        <input type="password" name="password-confirm" class="form-control" placeholder="Password Confirm">
                                    </div>                                    
                                    <div class="form-check col-sm-11 my-1">
                                        <input type="checkbox" id="checkbox">
                                        <label class="form-check-label" for="checkbox">I accept</label>
                                    </div> 
                                    <div class="col-sm-11 my-1">   
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </div>  
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </main>
</div>
@endsection