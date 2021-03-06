<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-10 px-0">
            <div class="card shadow text-center d-rtl">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">آگهی های فعال</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">آگهی های پسندیده</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">آگهی های غیرفعال</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    @foreach ($data as $user)
                        <div class="card border-3 shadow text-center mb-3">
                            <div class="card-header">
                                <h3>{{$user->name}}</h3>
                            </div>
                            <div class="card-body py-0">
                                <div class="card border-0">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 col-lg-4 col-xl-3">
                                            <small> نظرات و سوالات در مورد کالا<span class="glyphicon glyphicon-envelope"></span></small>
                                            <img src="/{{$user->img_src}}" class="card-img" alt="{{$user->name}}" width="150rem" height="150rem">
                                            <small>امتیاز</small>
                                        </div>
                                        <div class="col-md-8 col-lg-8 col-xl-9">
                                            <div class="card-body px-0">
                                                <div class="container-fluid">
                                                    <div class="row align-items-center justify-content-between">
                                                        <div class="col-md-6 text-right">
                                                            <h5 class="">قیمت:  @convert($user->price)</h5>
                                                        </div>
                                                        <div class="col-md-6 text-center d-ltr">
                                                            <div class="cotainer-fluid">
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <h6 class="rounded-lg bg-success p-2">وضیعت: فعال</h6>
                                                                    </div>
                                                                </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-12 text-right mt-3 mb-3">
                                                            <h6>بازدید: 100</h6>
                                                        </div>
                                                        <div class="col-sm-6 text-right mt-2 d-none d-sm-block">
                                                            <button type="button" class="btn btn-outline-secondary">سفارش ها</button>
                                                        </div>
                                                        <div class="col-sm-6 mt-2 text-center d-ltr d-none d-sm-block">
                                                            <div class="cotainer-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-lg-10 col-xl-6 px-0">
                                                                        <button type="button" class="btn btn-outline-danger mr-2">حذف</button>
                                                                        <button type="button" class="btn btn-outline-warning">ویرایش</button>
                                                                    </div>
                                                                </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-12 text-center d-block d-sm-none s-f">
                                                            <button type="button" class="btn btn-outline-secondary mt-1"><small>سفارش ها</small></button>
                                                            <button type="button" class="btn btn-outline-warning mt-1"><small>ویرایش</small></button>
                                                            <button type="button" class="btn btn-outline-danger mt-1"><small>حذف</small></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                @duration($user->created_at)
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
{{ $slot }}
