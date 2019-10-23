@extends('layouts.main')
@section('content')




<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            
                <li class="nav-item active">
                    <a class="nav-link" href="http://192.168.43.83:81/login1">Loing <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="http://192.168.43.83:81/register1">Register <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <div class="row justify-content-center">
        <!-- form site -->
        <div class=" offset-1 col-10 offset-sm-2 col-sm-8 offset-md-3 col-md-6 offset-lg-4 col-lg-4 background-form border-sl">
            
                <!-- login -->
                <div class="col-12">   
                    <div class="row justify-content-start">
                        <div class="col-2 text-center">
                            <h3><i>login</i></h3>
                        </div>
                    </div>        
                </div>
                <!-- end login -->
                <form action="/login1" method="post"> 
                    @csrf
                    <!-- user name -->      
                    <div class="col-12 form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="emailtext" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <!-- end user name -->
                    <!-- password -->
                    <div class="col-12 form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                    </div>
                    <!-- end password -->
                    <!-- remember me -->
                    <div class="col-12 form-group">
                        <input type="checkbox" name="checkbox" id="exampleCheck1">

                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>       
                    <!-- end remember me -->
                    <!-- logon-forgot pass -->
                    <div class="col-12 form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <span>Forgot <a href="#">password?</a></span>
                    </div>
                </form>
                @if(@isset($login_res))
                    @if($login_res['status'])
                        <div class="alert alert-success">
                            {{$login_res['msg']}}  
                        </div>   
                    @else 
                        <div class="alert alert-danger">
                            {{$login_res['msg']}}
                        </div>
                    @endif            
                @endif
                
                <!-- logon-forgot pass -->
                <!-- end form -->
            
        </div>
    </div>

</div>

@endsection