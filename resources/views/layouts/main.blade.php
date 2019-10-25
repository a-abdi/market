<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.head')
        <title>Document</title>
    </head>
    <body class="bg-b">
        <div id="app">
            @include('layouts.nav')
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>

