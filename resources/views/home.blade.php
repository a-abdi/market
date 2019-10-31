@extends('layouts.main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/home/home.css')}}">
@endsection

@section('scripts')
<script src="{{asset('js/home/home.js')}}"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
        <img onload="" src ="{{asset('imag/11.jpg')}}" class ="img-fluid" alt ="Responsive image">
        </div>
        <div id="name" class ="col-sm-6 col-md-4 col-lg-3">y</div>
        <div class ="col-sm-6 col-md-4 col-lg-3"> 
        
        a
        </div>
        <div class ="col-sm-6 col-md-4 col-lg-3"> 
        
        a
        </div>
        <div class ="col-sm-6 col-md-4 col-lg-3"> 
        
        a
        </div>
        <div class ="col-sm-6 col-md-4 col-lg-3"> 
        
        a
        </div>


    </div>
</div>
@endsection

