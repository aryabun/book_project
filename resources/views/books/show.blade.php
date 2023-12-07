@extends('layouts.default')
@section('title')
    {{ $book->name }}
@endsection
@section('header')
    @include('includes.header')
@endsection
@section('content')
    <div class="d-flex flex-row justify-content-end border-bottom mb-3">
        <a href="{{ route('books.edit', $book) }}" type="button" class="btn btn-secondary m-2"><i class="fa-solid fa-pen-to-square"></i></a>
        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block">
            @method('delete')
            @csrf
            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger m-2"><i class="fa-solid fa-trash"></i></a>
        </form>
    </div>
    <div class="row">
        <div class="col-5">
            @if ($book->image)
                <img src="{{ asset('storage/images/' . $book->image) }}">
            @else
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcSaTcPQHrUCsxJuUmSeCkG6KIKW5zp99pdw&usqp=CAU"
                    alt="">
            @endif
        </div>
        <div class="col">
            <h2 class="my-3">{{ $book->name }}</h2>
            <h5 class="my-3 text-muted">Author: {{ $book->author }}</h2>
            <p>Created at: {{ $book->created_at }}</p>
            <p>ISBN: {{ $book->isbn }}</p>
        </div>
    </div>
@endsection
