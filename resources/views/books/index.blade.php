@extends('layouts.default')
@section('title', 'Book List')
@section('header')
    @include('includes.header')
@endsection
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Book List</h2>
        @can('create-book')
            <a href="{{ route('books.create') }}" type="button" class="btn btn-dark"><i class="fa-solid fa-plus"></i></a>
        @endcan
    </div>
    <div class="row">
        @foreach ($books as $book)
            <div class="col col-3 my-3">
                <div class="card h-100">
                    @if ($book->image)
                        <img class="card-img-top m-auto mt-2" src="{{ asset('storage/images/' . $book->image) }}"
                            style="height: 50%; width: 50%;">
                    @else
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcSaTcPQHrUCsxJuUmSeCkG6KIKW5zp99pdw&usqp=CAU"
                            alt="" class="card-img-top m-auto mt-2" style="height: 50%; width: 50%;">
                    @endif
                    <div class="m-3 card-title">
                        <a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a>
                    </div>

                    <div class="card-footer bg-white">
                        <p class="card-text">Author: {{ $book->author }}</p>
                        <p class="card-text">ISBN: {{ $book->isbn }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-2">
        {!! $books->links() !!}
    </div>
@endsection
