@extends('layouts.main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/home/home.css')}}">
@endsection

@section('scripts')
<script src="{{asset('js/home/home.js')}}"></script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <img src ="{{asset('imag/11.jpg')}}" class ="img-fluid" alt ="Responsive image">
        </div>
    </div>
    <div id="main" class="row justify-content-end">
        
    </div>

</div>
@endsection

