<div class="flex-shrink-0 p-3 bg-light" style="width: 280px; min-height: 100vh;">
    <a href="/" class="d-flex justify-content-center pb-3 mb-3 text-decoration-none border-bottom ps-0">
        <span class="fs-5 fw-semibold">Admin</span>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <a href="/" type="button" class="btn btn-toggle align-items-center rounded">
                Home
            </a>
        </li>
        <li class="mb-1">
            <a href="{{route('admin.dashboard')}}" type="button" class="btn btn-toggle align-items-center rounded">
                Dashboard
            </a>
        </li>
        <li class="mb-1">
            <div class="dropdown">
                <button class="dropdown-toggle btn btn-toggle align-items-center rounded collapsed"
                    data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    Role and Permission
                </button>
                <div class="collapse" id="orders-collapse">
                    <ul class="px-4 btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="{{route('roles.index')}}" class="rounded">Roles</a></li>
                        <li><a href="{{route('permission.index')}}" class="rounded">Permission</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="border-top my-3"></li>
        <li class="mb-1">
            <button class="dropdown-toggle btn btn-toggle align-items-center rounded collapsed"
                data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                Account
            </button>
            <div class="collapse" id="account-collapse">
                <ul class="px-4 btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="rounded">Profile</a></li>
                    <li><a href="{{route('users.index')}}" class="rounded">Settings</a></li>
                    <li><a href="#" class="rounded">Sign out</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
