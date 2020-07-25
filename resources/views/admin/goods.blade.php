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
        @component('components.tab_search_goods')
        @endcomponent
        @component('components.admin.goods_table', [ 'data' => $data ])
        @endcomponent
@endsection


