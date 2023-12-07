<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body class="d-flex flex-column" style="min-height: 100vh">
    <div class="d-flex flex-row">
        @include('admin.layout.sidebar')
        <div class="d-flex flex-column w-100">
            @include('includes.header')
            <div class="container">
                <div class="row" id="main">
                    @yield('content')
                </div>
            </div>
            <footer class="footer mt-auto">
                @include('includes.footer')
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>