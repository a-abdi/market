@extends('layouts.users.main')


@section('title')
    user_profile
@endsection


@section('styles')

@endsection


@section('scripts')

@endsection


@section('content') 
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card text-right d-rtl border-0" style="width: 50rem;">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div clsss="col-12 col-sm-8 col-md-10">
                            <img src="https://img.icons8.com/fluent/48/000000/user-male-circle.png" class="rounded-circle z-depth-0" alt="avatar image" width="80" height="80">
                        </div>
                        <div class="col-12 col-sm-8 col-md-10 text-left">
                            <a href="#" class="btn btn-outline-dark mt-4">تنظیمات حساب کاربری</a>   
                        </div>
                    </div>    
                </div>
                <p class="card-text my-4">شما هنوز پستی در Farm To Home ننوشته‌اید. همین حالا اقدام به نوشتن اولین پست خود کنید.</p>
                <a href="#" class="btn btn-primary">نوشتن اولین پست</a>
            </div>
        </div>
    </div>
</div>


@endsection