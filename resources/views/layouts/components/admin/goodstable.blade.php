<div class="container-fluid mt-1">
    <div class="row justify-content-center">
        <div class="col-12 d-rtl text-right px-0" id="entry_table">
            @component('layouts.components.main.table')
                @slot('titletable')
                    <th scope="col" style="min-width: 10rem;">#</th>
                    <th scope="col" style="min-width: 10rem;">عکس</th>
                    <th scope="col" style="min-width: 10rem;">نام</th>
                    <th scope="col" style="min-width: 10rem;">قیمت</th>
                    <th scope="col" style="min-width: 10rem;">تاریخ ارسال</th>
                    <th scope="col" style="min-width: 10rem;">id</th>
                    <th scope="col" style="min-width: 10rem;"> user_id</th>
                @endslot
                @php
                $i = 0;
                @endphp                    
                @foreach ($data as $good)
                    <tr id ="{{$good->id}}">
                        <th class="py-3 d-flex align-items-center" scope="row">{{$i = $i+1}} </th>
                        <td ><img src="/{{$good->img_src}}" class="pointer" alt="{{$good->name}}" onclick="details_image({{$good->id}})" style="max-width: 5rem;" height="50rem"></td>
                        <td class="py-3">{{$good->name}}</td>
                        <td class="py-3">{{$good->price}}</td>
                        <td class="py-3">{{$good->created_at}}</td>
                        <td class="py-3">{{$good->id}}</td>
                        <td class="py-3">{{$good->user_id}}</td>
                        <td><button class="btn btn-outline-danger" onclick="delete_good({{$good->id}})"> حذف</button> </td>
                        <td><button class="btn btn-outline-info" onclick="users({{$good->user_id}})"> لینک</button> </td>
                    <tr>
                @endforeach
            @endcomponent
        </div>
    </div>
</div>