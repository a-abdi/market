@extends('layouts.admin.main')


@section('title')
    index
@endsection


@section('styles')

@endsection


@section('scripts')

@endsection


@section('content')
        @component('components.admin.users_about',['users' => $users])
        @endcomponent
@endsection