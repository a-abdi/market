@extends('layouts.main')

@section('title')
    mygoods
@endsection

@section('styles')
<!-- <link rel="stylesheet" href="{{asset('css/profile/profile.css')}}"> -->
@endsection

@section('scripts')
<!-- <script src="{{asset('js/profile/profile.js')}}"></script>
<script src="{{asset('js/main/show_image.js')}}"></script> -->
@endsection

@section('content') 

<div class="container">
    <div class="row">
        <div class="col-md-10 col-lg-8 col-xl-6">
            <img src="/{{$data['0']->img_src}}" alt="{{$data['0']->name}}" width="300rem" height="300rem">
        </div>
    </div>

</div>

        

@endsection