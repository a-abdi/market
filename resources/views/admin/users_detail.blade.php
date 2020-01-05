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
        @component('layouts.components.admin.users_about',['users' => $users])
        @endcomponent
    @endgrid
@endsection