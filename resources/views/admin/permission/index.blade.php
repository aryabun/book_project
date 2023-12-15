@extends('admin.layout.default')
@section('title', 'Permissions')
@section('content')
    <div class="container my-3">
        <h2>Permissions</h2>
        <div class="card my-3">
            <div class="card-header">
                Create Permission
            </div>
            <div class="card-body">
                <form action="{{ route('permission.store') }}" method="POST">
                    @csrf
                    <div class="row my-2">
                        <label for="name">
                            Permission name:
                            <input type="text" name="name" id="permission_name" class="form-control"
                                placeholder="Ex: create-book...">
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Permission</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->created_at }}</td>
                            <td>
                                <div class="d-flex flex-row">
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#editPermissionModal{{ $permission->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('permission.destroy', $permission) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="btn btn-danger mx-2">Delete</button>
                                    </form>
                                </div>
                                {{-- UPDATE PERMISSION Modal --}}
                                <div class="modal fade" id="editPermissionModal{{ $permission->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="editPermissionModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editPermissionModalLabel">Edit Permission
                                                    : {{ $permission->name }}</h5>
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
                                                <form action="{{ route('permission.update', $permission->id) }}" method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Permission</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    id="name" autocomplete="off"
                                                                    value="{{ $permission->name }}">
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
                                {{-- END PERMISSION Modal --}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
