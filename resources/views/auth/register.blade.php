@extends('layouts.default')
@section('title', 'Register')
@section('content')
<div class="card mt-5">
    <div class="card-header">Register</div>
    <div class="card-body">
        <form action="{{ route('auth.store')}}" method="POST">
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
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3 mb-2">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <div class="d-flex justify-content-center">
                Already have account? <a href="{{route('auth.login')}}">Sign in</a>
            </div>
        </form>
    </div>
</div>

@endsection