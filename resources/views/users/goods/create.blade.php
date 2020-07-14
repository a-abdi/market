@extends('layouts.users.main')

@section('title')
    Profile
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('css/profile/profile.css')}}">
@endsection

@section('scripts')
<script src="{{asset('js/profile/profile.js')}}"></script>
<script src="{{asset('js/main/show_image.js')}}"></script>
@endsection

@section('content') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11 mx-2 border">
            <div class="row justify-content-around">
                <div class="col-md-4 my-1 text-center">
                    <input type="text" class="form-control text-right" id="name" placeholder="نام کالا">
                </div>
                <div class="col-md-4 my-1 text-center">
                    <input type="number" min="0" step="1" max="99999999" class="form-control text-right" id="price" placeholder="قیمت کالا">
                </div>
                <div class="col-md-4 my-1 text-center">
                    <input class="border rounded w-100" type="file" onchange="readURL(this);" id="file" >
                </div>
                <div class="col-12 text-center my-1" id="image_preview">
                    <img id="blah" src="" class="d-none" alt="your image"/>
                        <!-- show image preview -->
                </div>
                <div class="col-12 my-1 text-center">
                    <button type="button" onclick="save_good({{Session::get('user_id')}})" class="btn btn-primary">
                        ارسال
                    </button>
                </div>
            </div>
            <div class="row justify-content-center my-1" id="msg">
                <!-- show masseg result -->
            </div>       
        </div>
        <div class="col-11 mx-2 border">
            <div id="main" class ="row justify-content-end">
                    <!-- show image thumbnails -->
                    
            </div>
        </div>
    </div>
</div>


@endsection