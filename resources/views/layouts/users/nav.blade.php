            
@if(!session('user_phone_number'))
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand py-0" href="/">
                <img src="/gif.png" alt="خانه" class ="pointer" height="45" width="45">
            </a>
            <button class ="navbar-toggler" type ="button" data-toggle ="collapse" data-target ="#navbarSupportedContent" aria-controls ="navbarSupportedContent" aria-expanded ="false" aria-label ="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class ="collapse navbar-collapse" id ="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class ="navbar-nav mr-auto">
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class ="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li class ="nav-item">
                        <a class ="nav-link" href="/users/login">ورود</a>
                    </li>
                    <li class ="nav-item">
                            <a class="nav-link" href="/users/register">ثبت نام</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@else
        
    <!--Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand py-0" href="/">
                <img src="/gif.png" alt="خانه" class ="pointer" height="45" width="45">
            </a>

            <button class ="navbar-toggler" type ="button" data-toggle ="collapse" data-target ="#navbarSupportedContent-555" aria-controls ="navbarSupportedContent-555" aria-expanded ="false" aria-label ="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse text-right" id="navbarSupportedContent-555">
                <ul class="navbar-nav mr-auto">
                    
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Dropdown
                        </a>
                        <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li> -->
                </ul>
                
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <!-- <li class="nav-item">
                        <a class="nav-link waves-effect waves-light">1
                            <i class="fas fa-envelope"></i>
                        </a>
                    </li> -->
                    <li class="nav-item mt-1">
                        <a class="nav-link" id="id_1" onmouseover="enabel_shadow(this)" onmouseout="disable_shadow(this)" href="/users/{{ Session::get('user_id')}}/goods">آگهی های من</a>
                    </li>
                    <li class="nav-item mt-1">
                        <a class="nav-link" id="id_2" onmouseover="enabel_shadow(this)" onmouseout="disable_shadow(this)" href="/users/{{Session::get('user_id')}}/goods/create">ثبت آگهی</a>
                    </li>
                    <li class="nav-item avatar dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0" alt="avatar image" width="40" height="40">
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary text-right" aria-labelledby="navbarDropdownMenuLink-55">
                            <a class="dropdown-item" href="#" id="id_3" onmouseover="enabel_shadow(this)" onmouseout="disable_shadow(this)">پروفایل</a>
                            <a class="dropdown-item" href="#" id="id_4" onmouseover="enabel_shadow(this)" onmouseout="disable_shadow(this)">سفارش های من</a>
                            <a class="dropdown-item" href="{{action('UsersController@user_exit')}}" id="id_5" onmouseover="enabel_shadow(this)" onmouseout="disable_shadow(this)">خروج</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!--/.Navbar -->
@endif
        
       