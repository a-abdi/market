@extends('layouts.admin.main')


@section('title')
    index
@endsection


@section('styles')

@endsection


@section('scripts')

@endsection


@section('content')
    @grid()
        @component('admin.components.users_about',['users' => $users])
        @endcomponent
    @endgrid
@endsection