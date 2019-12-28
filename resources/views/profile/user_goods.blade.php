@extends('layouts.main')

@section('title')
    user_goods
@endsection

@section('styles')
<!-- <link rel="stylesheet" href="{{asset('css/profile/profile.css')}}"> -->
@endsection

@section('scripts')
<!-- <script src="{{asset('js/profile/profile.js')}}"></script>
<script src="{{asset('js/main/show_image.js')}}"></script> -->
@endsection

@section('content') 

@component('layouts.components.goods',['data' => $data])

@endcomponent


@endsection