@extends('layouts.users.main')

@section('title')
    Register
@endsection

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
                <div class="card-header text-right">
                    ثبت نام
                </div>
                <div class="card-boy">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="form-group row justify-content-around">
                            <div class="col-sm-5 col-11 my-1">   
                                <input type="text" name="last_name" class="form-control text-right" placeholder="نام خانوادگی" tabindex="2">
                            </div>
                            <div class="col-sm-5 col-11 my-1">
                                <input type="text" name="frist_name" class="form-control text-right" placeholder="نام" tabindex="1">
                            </div> 
                            <div class="col-sm-5 col-11 my-1">
                                <input type="email" name="email" class="form-control text-right" placeholder="ایمیل" tabindex="4">
                            </div> 
                            <div class="col-sm-5 col-11 my-1">
                                <input type="tel" name="phone_number" class="form-control text-right" placeholder="شماره تلفن" tabindex="3">
                            </div> 
                            <div class="col-sm-5 col-11 my-1">   
                                <input type="password" name="password_confirm" class="form-control text-right" placeholder="تایید رمز" tabindex="6">
                            </div>                                    
                            <div class="col-sm-5 col-11 my-1">
                                <input type="password" name="password" class="form-control text-right" placeholder="رمز" tabindex="5">
                            </div> 
                            <div class="col-11 my-1 text-center">   
                                <button type="submit" class="btn btn-primary" tabindex="7">ثبت نام</button>
                            </div>  
                        </div>
                    </form>
                    <div class="row justify-content-center text-center">
                        <div class="col-11">
                            @if ($errors->any())
                                <div class="alert alert-danger pb-2">
                                    <ul class="d-rtl">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @break
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>


@endsection