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
    {{-- UPDATE BOOK FORM --}}
    <form action="{{ route('books.update', $book) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="d-flex flex-column border-bottom mb-3">
            <div class="d-flex flex-row justify-content-end mb-3">
                <button type="submit" class="btn btn-primary mx-3">Update</button>
                <a href="{{ route('books.show', $book) }}">
                    <button type="button" class="btn btn-danger">Cancel</button>
                </a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-7 border rounded">
                <div class="d-flex flex-column h-100 m-3">
                    <div class="d-flex flex-column">
                        <input type="file" accept=".jpg, .jpeg, .png" id="selectImage" name="images[]"
                            @error('images') is-invalid @enderror class="form-control" multiple>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="col-3">
                            @foreach ($book->images as $item)
                                <div class="row m-auto border-bottom">
                                    <div class="d-flex flex-row justify-content-end pt-2">
                                        <a class="dropdown-item" type="button"
                                            onclick="event.preventDefault(); document.getElementById('image{{ $item->id }}').submit();"><i
                                                class="fa-solid fa-xmark"></i>
                                        </a>
                                    </div>
                                    <img class="display" id="{{ $item->id }}"
                                        src="{{ asset('storage/images/' . $item->name) }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex flex-column" style="overflow: hidden; ">
                            @if ($book->images->isEmpty())
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcSaTcPQHrUCsxJuUmSeCkG6KIKW5zp99pdw&usqp=CAU"
                                    alt="">
                            @else
                                <img id="preview" src="{{ asset('storage/images/' . $book->images[0]->name) }}"
                                    alt="your image" class="mt-3" />
                            @endif
                        </div>
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
    </form>
    {{-- IMAGE REMOVE --}}
    @if (!$book->images->isEmpty())
        @foreach ($book->images as $item)
            <form id="image{{ $item->id }}" action="{{ route('image.destroy', $item->id) }}" method="POST"
                style="display: none;">
                @csrf
                @method('delete')
            </form>
        @endforeach
    @endif
    {{-- END IMAGE REMOVE --}}
@endsection
