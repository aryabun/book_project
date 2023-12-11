<div class="mb-3 h-100" style="box-shadow: 10px 1px 8px 0px gray;">
    <div class="container h-100 me-auto">
        <div class="d-flex flex-row justify-content-between align-items-center h-100">
            <a id="logo" class="px-2 nav-link" href="/">Books</a>
            @guest
                <div class="d-flex">
                    <a type="button" class="nav-link px-2" href="{{ route('auth.login') }}">{{ __('Login') }}</a>
                    |<a type="button" class="nav-link px-2" href="{{ route('auth.register') }}">{{ __('Register') }}</a>
                </div>
            @else
                <div class="dropdown">
                    <a class="dropdown-toggle nav-link" type="button" id="dropdownMenu2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        @can('view-admindashboard')
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    Admin Dashboard
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
