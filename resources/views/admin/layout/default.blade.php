<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body class="bg-light">
    <div class="d-flex flex-row min-vh-100">
        @include('admin.layout.sidebar')
        <div class="d-flex flex-column w-100" id="main">
            <header class="bg-info text-white ">
                @include('includes.header')
            </header>
            @yield('content')
        </div>
    </div>
    <footer class="footer mt-auto bg-info">
        @include('includes.footer')
    </footer>
    {{-- ADD ECHO AND SWEETALERT FOR NOTIFICATION --}}
</body>

</html>
