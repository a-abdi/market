@extends('layouts.main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/auth/register.css')}}">
@endsection

@section('scripts')

@endsection

@section('content') 
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
                            @if(@isset($register_res))
                                @if($register_res['status'])
                                    <div class="alert alert-success">
                                        {{$register_res['msg']}}
                                    </div>
                                @else
                                    <div class="alert alert-danger">
                                        {{$register_res['msg']}}
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


@endsection