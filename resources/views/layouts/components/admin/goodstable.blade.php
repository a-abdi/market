<div class="container-fluid mt-1">
        <div class="row justify-content-center">
            <div class="col-12 d-rtl text-right">
                @component('layouts.components.main.table')
                    @slot('titletable')
                        <th scope="col">#</th>
                        <th scope="col">عکس</th>
                        <th scope="col">نام</th>
                        <th scope="col">قیمت</th>
                        <th scope="col">تاریخ ارسال</th>
                        <th scope="col">id</th>
                        <th scope="col"> user_id</th>
                    @endslot
                    @php
                    $i = 0;
                    @endphp                    
                    @foreach ($data as $good)
                        <tr id ="{{$good->id}}">
                            <th scope="row">{{$i = $i+1}} </th>
                            <td><img src="/{{$good->img_src}}" class="pointer" alt="{{$good->name}}" onclick="details_image({{$good->id}})" style="max-width: 5rem;" height="50rem"></td>
                            <td>{{$good->name}}</td>
                            <td>{{$good->price}}</td>
                            <td>{{$good->created_at}}</td>
                            <td>{{$good->id}}</td>
                            <td>{{$good->user_id}}</td>
                            <td><button class="btn btn-outline-danger" onclick="deletegood({{$good->id}})"> حذف</button> </td>
                        <tr>
                    @endforeach
                @endcomponent
            </div>
        </div>
    </div>