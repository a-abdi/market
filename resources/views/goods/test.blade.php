@extends('layouts.users.main')

@section('title')
    Information Image
@endsection

@section('scripts')
    <script src="{{asset('js/main/comment.js')}}"></script>
    <script src="{{asset('js/goods/information.js')}}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/goods/information.css')}}">
@endsection

@section('content') 
<div class="container">
   <div class="row" id="row">
        <div class="col text-center m-4 p-4"><h1>Hello Baby</h1></div>
    </div>
</div>

@endsection
