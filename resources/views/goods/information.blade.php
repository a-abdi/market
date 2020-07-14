@extends('layouts.users.main')

@section('title')
    Information Image
@endsection

@section('scripts')
    <script src="{{asset('js/goods/comments.js')}}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/image/image.css')}}">
@endsection

@section('content') 
<div class="container">
   <div class="row">
        <div class="col-12 text-right d-block d-sm-block d-md-none d-lg-none d-xl-none">
            <h1 class="hidden-lg-up">{{$data->name}}</h1>
        </div>

        <div class="col-12">
            <div class="card mb-3 bg" id="primary_card">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/{{$data->img_src}}" class="card-img" alt="{{$data->name}}" width="300rem" height="300rem">
                        <div class="text-center"> امتیاز</div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <div class="d-none d-sm-none d-md-block d-lg-block d-xl-block text-right">
                            <h1 class="card-title  ">
                                {{$data->name}}
                            </h1>
                        </div>
                            <div>
                                <div class=" mt-4 mb-3 py-1 text-right">
                                    <span class="d-rtl" >
                                        <h5 class="d-rtl">{{$data->price}}:تومان</h5> 
                                    </span>
                                </div>
                            </div>
                            <div class="my-2 py-1 text-right">
                                <span > {{$data->created_at}} </span>
                            </div>
                            <div id="accordion" class="text-right">
                                <div class="card border-0">
                                    <div class="card-header border-0 px-0" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link px-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                مشخصات کالا
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <ul class="d-rtl lstn">
                                                <li><span >  ساکرز </span></li>
                                                <li><span > پروفین </span></li>
                                                <li><span > نوع عسل </span></li>
                                            </ul>            
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-0">
                                    <div class="card-header border-0 px-0"  id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed px-0" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                اطاعات فروشنده
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <ul class="d-rtl lstn">
                                                <li>نام<span > {{$data->first_name}} {{$data->last_name}}</span></li>
                                                <li> ایمیل<span > {{$data->email}} </span></li>
                                                <li> شماره تلفن<span > {{$data->phone_number}} </span></li>
                                            </ul>            
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-0">
                                    <div class="card-header border-0 px-0" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed px-0" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                توضیحات 
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            محصول بسیار good هست
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- <div class="card border-0">
                                    <div class="card-header border-0 px-0" id="headingFour">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed px-0" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                نظرات
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                        <div class="card-body">
                                            محصول بسیار کیری هست
                                        </div>
                                    </div>
                                </div> -->
                                @if(session('user_phone_number'))
                                    <button class="btn btn-primary d-rtl" onclick="comments_view('primary_card', {{$data->post_id}})">
                                        افزودن نظر جدید
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($comments as $comment)
                <div class="card  d-rtl text-right">

                    <div class="card-body">
                        <div class="card-title">
                            <img src="https://img.icons8.com/fluent/48/000000/user-male-circle.png" class="rounded-circle z-depth-0" alt="avatar image" width="40" height="40">
                            <small class="s-f">
                                {{$comment->first_name}} {{$comment->last_name}}
                                <button type="btn" class="btn btn-light s-f">پاسخ</button>
                                <br>
                                @duration($comment->created_at) 
                            </small>
                        </div>
                        <p class="card-text">{{$comment->body}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
