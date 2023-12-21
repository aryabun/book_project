<div class="mb-3 h-100" style="box-shadow: 10px 1px 8px 0px gray;">
    <div class="container h-100 me-auto">
        <div class="d-flex flex-row justify-content-between align-items-center h-100">
            <a id="logo" class="px-2 nav-link" href="/">Books</a>
            <div class="d-flex flex-row">
                @guest
                    <div class="d-flex">
                        <a type="button" class="nav-link px-2" href="{{ route('auth.login') }}">{{ __('Login') }}</a>
                        |<a type="button" class="nav-link px-2"
                            href="{{ route('auth.register') }}">{{ __('Register') }}</a>
                    </div>
                @else
                    <button type="button" class="btn position-relative m-auto me-5">
                        <i class="fas fa-bell"></i>
                        <span class="position-absolute top-0 badge rounded-pill bg-danger">
                            99+
                    </button>
                    <div class="dropdown m-auto">
                        <a class="dropdown-toggle nav-link" type="button" id="dropdownMenu2" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li>
                                <a class="dropdown-item" href="#">
                                    {{ __('Request Book') }}
                                </a>
                            </li>
                            @can('view-admindashboard')
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        {{ __('Admin Dashboard') }}
                                    </a>
                                </li>
                            @endcan
                            <li>
                                <a class="dropdown-item" href="{{ route('auth.logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</div>
<script>
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: '{{ env('PUSHER_APP_KEY') }}',
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        forceTLS: true,
        encrypted: true,
    });
    Echo.private(`new.user.{{ Auth::id() }}`)
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
<style>
    .iconClass {
        position: relative;
    }

    .iconClass span {
        position: absolute;
        top: 0px;
        right: 0px;
        display: block;
    }
</style>
