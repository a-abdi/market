@extends('layouts.admin.main')


@section('title')
    admin|goods
@endsection


@section('styles')

@endsection


@section('scripts')

@endsection


@section('content')
    <div class="contanier">
        <div class="row justify-content-center">
            <div class="col-12">
                @component('layouts.components.goodstable',['data' => $data])
                    @slot('titletable')
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">عکس</th>
                            <th scope="col">نام</th>
                            <th scope="col">قیمت</th>
                            <th scope="col">تاریخ ارسال</th>
                        </tr>
                    @endslot
                    @php
                    $i = 0;
                    @endphp                    
                    @foreach ($data as $good)
                        <tr>
                            <th scope="row">{{$i = $i+1}} </th>
                            <td><img src="/{{$good->img_src}}" class="card-img" alt="{{$good->name}}" style="max-width: 5rem;" height="50rem"></td>
                            <td>{{$good->name}}</td>
                            <td>{{$good->price}}</td>
                            <td>{{$good->created_at}}</td>
                        <tr>
                    @endforeach
                @endcomponent
            </div>
        </div>
    </div>
@endsection


