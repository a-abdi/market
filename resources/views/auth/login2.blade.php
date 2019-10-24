@extends("layouts/mainlogin")
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
                                <a class="nav-link" href="http://192.168.43.83:81/login2">Login</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="http://192.168.43.83:81/register2">Register</a>
                            </li>
                    </ul>
                </div>
            </div>
    </nav>
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 col-sm-8 col-md-5 ">
                    <div class="card">
                        <div class="card-header">login</div>
                        <div class="card-body">
                            <form action="/login2" method="post">
                                @csrf
                                <div class="form-group row justify-content-center">
                                    <div class="col-12 my-2 form-group">
                                        <input type="tell" class="form-control" name="phone-number" placeholder="Phone number">
                                    </div>
                                    <div class="col-12 my-2 form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <div class="col-12 my-2 form-group">
                                        <input type="checkbox" name="checkbox" id="checkbox">
                                        <label class="form-check-label" for="checkbox">Remember me</label>
                                    </div> 
                                    <div class="col-12 my-2 form-group">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                        <span class="mx-2">Forgot <a href="#">password?</a></span>
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