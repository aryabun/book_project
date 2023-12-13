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
            <div class="col-7 border rounded">
                <div class="d-flex flex-row h-100 m-3">
                    <div class="d-flex flex-column">
                        <input type="file" accept=".jpg, .jpeg, .png" id="selectImage" name="images[]"
                            @error('images') is-invalid @enderror class="form-control" multiple>
                    </div>
                    <div class="d-flex flex-column">
                        <img id="preview" src="#" alt="your image" class="mt-3" />
                    </div>
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
@push('script')
    <script>
        selectImage.onchange = event => {
            preview = document.getElementById('preview');
            preview.style.display = 'block';
            const [file] = selectImage.files
            if (file) {
                preview.src = URL.createObjectURL(file);
            }
        }
    </script>
@endpush
