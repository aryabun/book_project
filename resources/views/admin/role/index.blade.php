@extends('admin.layout.default')
@section('title', 'Roles')
@section('content')
<div class="container my-3">
    <h2>Roles</h2>
    {{-- CREATE NEW ROLE --}}
    <div class="card my-3">
        <div class="card-header">Create New Role</div>
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                    <div class="row my-2">
                        <label for="name">
                            Role name:
                            <input type="text" name="name" id="role_name" class="form-control"
                            placeholder="Ex: admin...">
                        </label>
                    </div>
                    <label for="permission" class="form-label">Permission</label>
                    <div class="row">
                        <div class="col ">
                            @foreach ($permissions as $permission)
                                <input name="selected_permissions[]" class="form-check-input mx-2" type="checkbox"
                                value="{{ $permission->name }}">
                                <label for="permission" class="form-label">{{ $permission->name }}</label>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                        @if ($message = session()->has('success'))
                            <div class="toast" role="alert" data-bs-autohide="false">
                                <div class="d-flex">
                                    <div class="toast-body">{{ $message }}</div>
                                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        {{-- END CREATE NEW ROLE --}}
        {{-- DISPLAY ROLE --}}
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th width="40%">Permission</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach ($role->permissions->pluck('name') as $permission)
                                    <span class="badge bg-warning text-dark">{{ $permission }}</span>
                                @endforeach
                            </td>
                            <td>{{ $role->created_at }}</td>
                            <td>

                                <div class="d-flex flex-row">
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#editRoleModal{{ $role->id }}">
                                        Edit
                                    </button>

                                    {{-- DELETE ROLE  --}}
                                    <form action="{{ route('roles.destroy', $role) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="btn btn-danger mx-2">Delete</button>
                                    </form>
                                    {{-- END DELETE ROLE --}}
                                </div>
                                {{-- UPDATE ROLE AND PERMISSION Modal --}}
                                <div class="modal fade" id="editRoleModal{{ $role->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="editRoleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editRoleModalLabel">Edit Role
                                                    : {{ $role->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($errors->any())
                                                    {
                                                    <div class="alert alert-warning" role="alert">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    }
                                                @endif
                                                <form action="{{ route('roles.update', $role->id) }}" method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Role</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    id="name" autocomplete="off"
                                                                    value="{{ $role->name }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="permission"
                                                                    class="form-label">Permission</label>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        @foreach ($permissions as $permission)
                                                                            <input name="selected_permissions[]"
                                                                                class="form-check-input mx-2"
                                                                                type="checkbox"
                                                                                @foreach ($role->permissions->pluck('name') as $selected_permission) 
                                                                                @if ($permission->name == $selected_permission) checked @endif @endforeach
                                                                                value="{{ $permission->name }}">
                                                                            <label for="permission"
                                                                                class="form-label">{{ $permission->name }}</label>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            Change</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- END ROLE AND PERMISSION Modal --}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
