<div class="card mx-auto d-rtl text-right" style="max-width: 700px;">
    <div class="card-body px-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 py-2">
                    <h3>{{$users[0]->first_name}} {{$users[0]->last_name}}</h3>
                </div>
                <div class="col-sm-4 py-2 d-flex align-items-center">
                    امتیاز:
                </div>
                <div class="col-12 py-2">
                    شماره تلفن: {{$users[0]->phone_number}}
                </div>
                <div class="col-12 py-2">
                    ایمیل: {{$users[0]->email}}
                </div>
                <div class="col-12 py-2">
                    آدرس: 
                </div>
                <div class="col-12 py-2">
                   <hr>
                </div>
                @component('layouts.components.users_action')
                    <h4>تمام فعالیت کاربر را نشان می دهد</h4>
                @endcomponent
            </div>
        </div>
    </div>
</div>

