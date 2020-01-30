<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.users.head')
        <title>@yield('title')</title>
    </head>
    <body class="bg-b">
        <div id="app">
            @include('layouts.users.nav')
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>
