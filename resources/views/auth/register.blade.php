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
                <div class="card-header text-right">
                    ثبت نام
                </div>
                <div class="card-boy">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="form-group row justify-content-around">
                            <div class="col-sm-5 col-11 my-1">   
                                <input type="text" name="last_name" class="form-control text-right" placeholder="نام خانوادگی" required>
                            </div>
                            <div class="col-sm-5 col-11 my-1">
                                <input type="text" name="frist_name" class="form-control text-right" placeholder="نام" required>
                            </div> 
                            <div class="col-sm-5 col-11 my-1">
                                <input type="email" name="email" class="form-control text-right" placeholder="ایمیل">
                            </div> 
                            <div class="col-sm-5 col-11 my-1">
                                <input type="tel" name="phone_number" class="form-control text-right" placeholder="شماره تلفن" pattern="[1-9]{1}[0-9]{9}" required>
                            </div> 
                            <div class="col-sm-5 col-11 my-1">   
                                <input type="password" name="password_confirm" class="form-control text-right" placeholder="تایید رمز" required>
                            </div>                                    
                            <div class="col-sm-5 col-11 my-1">
                                <input type="password" name="password" class="form-control text-right" placeholder="رمز" required>
                            </div> 
                            <div class="col-11 my-1 text-center">   
                                <button type="submit" class="btn btn-primary">ثبت نام</button>
                            </div>  
                        </div>
                    </form>
                    <div class="row justify-content-center text-center">
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