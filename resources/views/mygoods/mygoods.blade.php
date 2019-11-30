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
        
       
            @foreach ($data as $user)
            <div class="col-12">
                <p class="text center m-2 p-2"> {{ $user->name }}</p> 

            </div>
            @endforeach


    </div>

</div>

        

@endsection