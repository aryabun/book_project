@extends('layouts.default')
@section('title')
    {{ $book->name }}
@endsection
@section('header')
    @include('includes.header')
@endsection
@section('content')
    <div class="d-flex flex-row justify-content-end border-bottom mb-3">
        @can('edit-book')
            <a href="{{ route('books.edit', $book) }}" type="button" class="btn btn-secondary m-2"><i
                    class="fa-solid fa-pen-to-square"></i></a>
        @endcan
        @can('delete-book')
            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block">
                @method('delete')
                @csrf
                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger m-2"><i
                        class="fa-solid fa-trash"></i></a>
            </form>
        @endcan
    </div>
    <div class="d-flex flex-row">
        <div class="col-4">
            @if ($book->images)
                <div class="d-flex flex-row">
                    <div class="col-3" style="overflow: auto;width: 170px; ">
                        @foreach ($book->images as $item)
                            <div class="row m-auto border-bottom">
                                <img class="undo" id="{{ $item->id }}"
                                    src="{{ asset('storage/images/' . $item->name) }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex flex-column m-auto" style="overflow: hidden; ">
                        <img id="preview" src="{{ asset('storage/images/' . $book->images[0]->name) }}" alt="your image" class="mt-3" />
                    </div>
                </div>
            @else
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcSaTcPQHrUCsxJuUmSeCkG6KIKW5zp99pdw&usqp=CAU"
                    alt="">
            @endif
        </div>
        <div class="col ms-5">
            <h2 class="my-3">{{ $book->name }}</h2>
            <h5 class="my-3 text-muted">Author: {{ $book->author }}</h2>
                <p>Created at: {{ $book->created_at }}</p>
                <p>ISBN: {{ $book->isbn }}</p>
        </div>
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script type="text/javascript">
        $(".undo").on("click", function(e) {
            e.preventDefault()
                    
            $('#preview').attr('src', e.target.src);
            // $('#preview').removeAttr("style");

        })
    </script>
@endsection
