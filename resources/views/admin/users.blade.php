@extends('layouts.admin.main')


@section('title')
    index
@endsection


@section('styles')

@endsection


@section('scripts')

@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-right">
            <div class="container">
                <div class="row justify-content-center d-rtl">
                    <div class="col-3 border py-2">
                        <span> نام و نام خانوادگی</span>
                    </div>
                    <div class="col-3 border py-2">
                        <span>تاریخ عضویت</span>
                    </div>
                    <div class="col-3 border py-2">
                        <span>شماره تلفن</span>
                    </div>
                    <div class="col-3 border py-2">
                        <span> ایمیل</span>
                    </div>
                    @foreach ($data as $user)
                    <div class="col-3 border py-2">
                        <span>{{$user->first_name}} {{$user->last_name}}</span>
                    </div>
                    <div class="col-3 border py-2">
                        <span>{{$user->created_at}}</span>
                    </div>
                    <div class="col-3 border py-2">
                        <span>{{$user->phone_number}}</span>
                    </div>
                    <div class="col-3 border py-2">
                        <span>{{$user->email}}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection