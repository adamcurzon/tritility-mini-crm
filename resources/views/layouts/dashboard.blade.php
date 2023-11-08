<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
</head>

<body class="antialiased dashboard">
    <nav>
        @include('includes.navigation')
    </nav>

    <main>
        @yield('content')
        <footer>
            @include('includes.footer')
        </footer>
    </main>
</body>

</html>