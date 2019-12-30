@extends('layouts.admin.main')


@section('title')
    admin|goods
@endsection


@section('styles')

@endsection


@section('scripts')
    <script src="{{asset('js/admin/goods.js')}}"></script>
@endsection


@section('content')

    @admin_goods_table(['data' => $data])

    @endadmin_goods_table

@endsection


