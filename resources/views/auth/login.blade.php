@extends('layouts.default')
@section('title', 'Login')
@section('content')
@if($message = Session::get('success'))
    <div class="alert alert-info">{{ $message }}</div>
@endif
<div class="card mt-5">
    <div class="card-header">Login</div>
    <div class="card-body">
        <form action="{{route('auth.authenticate')}}" method="POST">
            @csrf
            <div class="row">
                <label for="email">
                    Email
                    <input type="email" name="email" class="form-control">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </label>
            </div>
            <div class="row">
                <label for="password">
                    Password
                    <input type="password" name="password" class="form-control">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </label>
            </div>
            <div class="d-flex justify-content-center mt-3 mb-2">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="d-flex justify-content-center">
                Does not have account? <a href="{{route('auth.register')}}">Sign up</a>
            </div>
        </form>
    </div>
</div>

@endsection