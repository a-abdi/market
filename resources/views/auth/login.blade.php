@extends('layouts.main')

@section('scripts')

@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/auth/login.css')}}">
@endsection

@section('content')  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 col-sm-8 col-md-5 ">
            <div class="card">
                <div class="card-header">login</div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group row justify-content-center">
                            <div class="col-12 my-2 form-group">
                                <input type="tell" class="form-control" name="phone-number" pattern="[0-9]{11}" placeholder="Phone Number" required>
                            </div>
                            <div class="col-12 my-2 form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
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
                    @if(@isset($login_res))
                            <div class="alert alert-danger">
                                {{$login_res['msg']}}
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection