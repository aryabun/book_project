@extends('admin.layout.default')
@section('title', 'Roles')
@section('content')
    <div class="container my-3">
        <h2>All Users</h2>
        <div class="card my-3">
            <div class="card-header">Create New Admin</div>
            <div class="card-body">
                <form action="{{ route('auth.store') }}" method="POST">
                    @csrf
                    <div class="row mb-2">
                        <label for="name">
                            Name
                            <input type="name" name="name" class="form-control">
                        </label>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label for="email">
                                Email
                            </label>
                            <input type="email" name="email" class="form-control">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="col">
                            <label for="password">
                                Password
                            </label>
                            <input type="password" name="password" class="form-control">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                            <input type="text" name="role" class="form-control" value="admin" style="display: none;">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3 mb-2">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">

                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- Get role --}}
                            <td>
                                @foreach ($user->roles()->pluck('name') as $user_role)
                                    {{ $user_role }}
                                @endforeach
                            </td>
                            <td>
                                <a href="#" type="button" class="btn btn-secondary">Edit</a>
                                <a href="#" type="button" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                    @endforeach
                </table>
                <div class="d-flex justify-content-center mt-2">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
