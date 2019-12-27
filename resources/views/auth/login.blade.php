@extends('layouts.main')

@section('title')
    Login
@endsection

@section('scripts')

@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/auth/login.css')}}">
@endsection

@section('content')  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 col-sm-8 col-md-5">
            <div class="card">
                <div class="card-header text-right">ورود</div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group row justify-content-center">
                            <div class="col-12 my-2 form-group">
                                <input type="tell" class="form-control text-right" name="phone_number" placeholder="شماره تلفن">
                            </div>
                            <div class="col-12 my-2 form-group">
                                <input type="password" class="form-control text-right" name="password" placeholder="رمز">
                            </div>
                            <div class="col-12 my-2 form-group text-right">
                                <label class="form-check-label" for="checkbox">منو به یاد داشته باش</label>
                                <input type="checkbox" name="checkbox" id="checkbox">
                            </div> 
                            <div class="col-12 my-2 form-group text-center">
                                <button type="submit" class="btn btn-primary ">ورود</button>
                            </div>
                            <div class="col-12 my-2 form-group text-center font-t">
                                <span class="mx-2"><a href="#">پسوردم را فراموش کردم</a></span>
                            </div>
                        </div>
                    </form>
                    @if(@isset($login_res))
                            <div class="alert alert-danger text-center">
                                {{$login_res['msg']}}
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection