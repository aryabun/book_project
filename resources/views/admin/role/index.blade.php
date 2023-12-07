@extends('admin.layout.default')
@section('title', 'Roles')
@section('content')
    <h2>Roles</h2>
    <div class="card my-3">
        <div class="card-header">Create New Role</div>
        <div class="card-body">
            <form action="{{route('roles.store')}}" method="POST">
                @csrf
                <div class="row my-2">
                    <label for="name">
                        Role name:
                        <input type="text" name="name" id="role_name" class="form-control" placeholder="Ex: admin...">
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
                                <a href="{{ route('roles.edit', $role) }}"><button type="button"
                                        class="btn btn-secondary">Edit</button></a>
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
@endsection
