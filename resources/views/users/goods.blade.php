@extends('layouts.users.main')


@section('title')
    user_goods
@endsection


@section('styles')

@endsection


@section('scripts')

@endsection


@section('content') 
    @component('users.components.goods',['data' => $data])

    @endcomponent
@endsection