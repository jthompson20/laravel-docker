<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('partials.header')

</head>
<body>

    <div id="app">
        
        @include('partials.navigation')

        <main class="py-4">

            @yield('content')
        
        </main>
    
    </div>

    @include('partials.footer')

</body>
</html>
