<div class="bg-light border-bottom mb-3" style="height: 63px;">
    <div class="container h-100">
        <div class="d-flex flex-row justify-content-between align-items-center h-100">
            <a id="logo" class="px-2" href="/">Books</a>
            @guest
                <div class="d-flex">
                    <a type="button" class="px-2" href="{{ route('auth.login') }}">{{ __('Login') }}</a>
                    |<a type="button" class="px-2" href="{{ route('auth.register') }}">{{ __('Register') }}</a>
                </div>
            @else
                <div class="dropdown">
                    <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                        {{-- <span class="caret"></span> --}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
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
