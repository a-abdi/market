@extends('layouts.main')


@section('title')
    user_goods
@endsection


@section('styles')

@endsection


@section('scripts')

@endsection


@section('content') 
    @component('layouts.components.users.goods',['data' => $data])

    @endcomponent
@endsection