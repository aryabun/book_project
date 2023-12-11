@extends('layouts.default')
@section('title', 'Update book')
@section('header')
    @include('includes.header')
@endsection
@section('content')
    <h2 class="mt-3 center mb-3">Edit book</h2>
    @if ($errors->any()){
        <div class="alert alert-warning" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        }
    @endif
    <form action="{{ route('books.update', $book) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row mb-3">
            <div class="col-5 border rounded">
                <div class="d-flex flex-column h-100 m-3 justify-content-center">
                    <input type="file" name="image" @error('image') is-invalid @enderror class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                        value="{{ $book->name }}">
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" id="author" autocomplete="off"
                        value="{{ $book->author }}">
                </div>
                <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" name="isbn" class="form-control" id="isbn" autocomplete="off"
                        value="{{ $book->isbn }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('books.index') }}">
            <button type="button" class="btn btn-primary">Cancel</button>
        </a>
    </form>
@endsection
