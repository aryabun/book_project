@extends('admin.layout.default')
@section('title', 'Roles')
@section('content')
    <div class="container my-3">
        <h2>Roles</h2>
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
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th>Permission</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td></td>
                            <td>{{ $role->created_at }}</td>
                            <td>
                                <div class="d-flex flex-row">
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#editRoleModal">
                                        Edit
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editRoleModal" data-bs-backdrop="static"
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
                                                    <form action="{{ route('roles.update', $role) }}" method="post">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Role</label>
                                                                    <input type="text" name="name"
                                                                        class="form-control" id="name"
                                                                        autocomplete="off" value="{{ $role->name }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="permission" class="form-label">Permission</label>
                                                                    <select id="multiple-checkboxes" multiple>
                                                                        <option value="php">PHP</option>
                                                                        <option value="javascript">JavaScript</option>
                                                                        <option value="java">Java</option>
                                                                        <option value="sql">SQL</option>
                                                                        <option value="jquery">Jquery</option>
                                                                        <option value=".net">.Net</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary">Save Change</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Delete Button --}}
                                    <form action="{{ route('roles.destroy', $role) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="btn btn-danger mx-2">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>


    </div>
@endsection
