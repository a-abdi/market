<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.admin.head')
        <title>@yield('title')</title>
    </head>
    <body class="bg-b">
        <div id="app">
            @include('layouts.admin.nav')
            <main class="mt-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>