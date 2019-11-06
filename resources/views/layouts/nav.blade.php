<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                Home
            </a>
            
            @if(!session('phone_number'))
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
                            <a class ="nav-link" href ="/login">ورود</a>
                        </li>
                        <li class ="nav-item">
                                <a class="nav-link" href ="/register">ثبت نام</a>
                        </li>
                </ul>
            </div>
            @endif
        </div>
</nav>