@extends('layouts.default')
@section('title', 'Create new book')
@section('header')
    @include('includes.header')
@endsection
@section('content')
    <h2 class="my-5">Create new book</h2>
    @if ($errors->any()){
        <div class="alert alert-warning" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    }
    @endif
    <form action="{{route("books.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <input type="file" class="form-control" name="image" @error('image') is-invalid @enderror>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <input type="text" name="name" id="name" class="form-control" autocomplete="off" placeholder="Book Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="author" id="author" class="form-control" autocomplete="off" placeholder="Author">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="isbn" id="isbn" class="form-control" autocomplete="off" placeholder="ISBN">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white align-items-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@stop