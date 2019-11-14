@extends('layouts.main')

@section('title')
    Information Image
@endsection

@section('scripts')

@endsection

@section('styles')
    
@endsection

@section('content') 

<div class="container">
   <div class="row">
        <div class="col-12 text-right d-xs-block d-sm-block d-md-none d-lg-none d-xl-none">
            <h1 class="hidden-lg-up">{{$data->name}}</h1>
        </div>

        <div class="col-12">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/{{$data->img_src}}" class="card-img" alt="{{$data->name}}" width="300rem" height="300rem">
                        <div class="text-center"> امتیاز</div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-right d-xs-none d-sm-none d-md-block d-lg-block d-xl-block">{{$data->name}}</h5>
                            <div class=" my-2 py-1 text-right">
                                <span >{{$data->price}} تومان</span>
                            </div>
                            <div class="my-2 py-1 text-right">
                                <span > {{$data->created_at}} </span>
                            </div>
                            <div class="my-2 py-1 text-right">
                                <span >  مشخصات محصول دکمه باشد زده شد روش مشخصات بیاد </span> <br>
                                <ul>
                                    <li><span >  ساکرز </span></li>
                                    <li><span > پروفین </span></li>
                                    <li><span > نوع عسل </span></li>
                                </ul>
                            </div>
                            <div class="my-2 py-1 text-right">
                                <span >  مشخصات محصول دکمه باشد زده شد روش مشخصات بیاد </span> <br>
                                <ul>
                                    <li><span > {{$data->first_name}} </span></li>
                                    <li><span > {{$data->last_name}} </span></li>
                                    <li><span > {{$data->email}} </span></li>
                                    <li><span > {{$data->phone_number}} </span></li>
                                </ul>
                            </div>
                            <div class="my-2 py-1 text-right">
                                توضیحات فروشنده در مورد محصول
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
