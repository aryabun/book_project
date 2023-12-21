<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body>
    <header class="d-flex flex-column w-100">
        @yield('header')
    </header>
    <div class="container">
        <div class="d-flex flex-column">
            @yield('content')
        </div>
    </div>
    <footer class="footer mt-auto">
        @include('includes.footer')
    </footer>
</body>

</html>
