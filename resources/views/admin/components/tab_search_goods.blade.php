<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 pr-sm-0 d-none d-sm-block">
            <button class="btn btn-secondary w-100 rounded-0" onclick="good_search('input_search','table_body')">جستجو</button>
        </div>
        <div class="col-12 col-sm-9 col-md-10 pl-sm-0">
            <div class="input-group">
                <input type="text" id="input_search" class="form-control rounded-0 d-rtl text-right border-t" aria-label="Text input with dropdown button" placeholder = "نام را وارد کنید">
                <div class="input-group-append">
                    <button id="select_type_search" class="btn btn-outline-secondary dropdown-toggle rounded-0 bg-secondary text-white" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">براساس</button>
                    <div class="dropdown-menu d-rtl text-right">
                    <a class="dropdown-item" onclick="search_name('input_search','select_type_search')" href="#">نام کالا</a>
                    <a class="dropdown-item" onclick="search_price('input_search','select_type_search')" href="#">قیمت</a>
                    <a class="dropdown-item" onclick="search_created_at('input_search','select_type_search')" href="#">تاریخ ثبت</a>
                    <a class="dropdown-item" onclick="search_id('input_search','select_type_search')" href="#">id</a>
                    <a class="dropdown-item" onclick="search_user_id('input_search','select_type_search')" href="#">user_id</a>
                </div>
            </div>
        </div>
        <div class="col-12 px-0 pr-sm-0 d-block d-sm-none mt-1 ml-auto">
            <button class="btn btn-secondary w-100 rounded-0" onclick="good_search('input_search','table_body')">جستجو</button>
        </div>
    </div>
</div>