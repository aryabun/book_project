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
            <form action="{{route('permission.store')}}" method="POST">
                @csrf
                <div class="row my-2">
                    <label for="name">
                        Permission name:
                        <input type="text" name="name" id="permission_name" class="form-control" placeholder="Ex: create-book...">
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
                                <a href="{{ route('permission.edit', $permission) }}"><button type="button"
                                        class="btn btn-secondary">Edit</button></a>
                                <form action="{{ route('permission.destroy', $permission) }}" method="POST">
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
