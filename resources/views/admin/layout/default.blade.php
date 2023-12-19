<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body class="d-flex flex-column min-vh-100 w-100 bg-light">
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
    <script>
        window.Echo = new Echo({
            broadcaster: 'pusher',
            key: '{{ env('PUSHER_APP_KEY') }}',
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            forceTLS: true,
            encrypted: true,
        });
        Echo.private('new.user.{{ Auth::user()->id }}')
            .notification(notification => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 10000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    animation: true,
                    icon: "success",
                    title: notification.title,
                    text: notification.message,
                });
                console.log(notification.message);
            });
    </script>
</body>

</html>
