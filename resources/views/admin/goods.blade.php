@extends('layouts.admin.main')


@section('title')
    admin|goods
@endsection


@section('styles')

@endsection


@section('scripts')
    <script src="{{asset('js/admin/goods.js')}}"></script>
    <script src="{{asset('js/admin/tab_search.js')}}"></script>
    <script src="{{asset('js/main/table.js')}}"></script>
@endsection


@section('content')
   @grid()
        @component('layouts.components.admin.tab_search_goods')
        @endcomponent
    @endgrid
        @admin_goods_table(['data' => $data])
        @endadmin_goods_table
@endsection


