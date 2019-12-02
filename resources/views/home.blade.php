@extends('layouts.main')

@section('title')
    Home
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/home/home.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('js/home/home.js')}}"></script>
    <script src="{{asset('js/main/show_image.js')}}"></script>
    <script src="{{asset('js/main/event_mouseover_showitem.js')}}"></script>
    <script src="{{asset('js/main/show_avetar.js')}}"></script>
@endsection

@section('content')
<div class ="container-fluid">
    <div class ="row justify-content-center">
        <div class="col-12">
            <div class ="container-fluid">
                <div class ="row justify-content-center">
                    <div class ="col-12 mb-4">
                        <img src ="{{asset('imag/11.jpg')}}" class ="img-fluid" alt ="Responsive image">
                    </div>
                </div>
                <div id="main" class ="row justify-content-end">
                    <!-- show image thumbnails -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

