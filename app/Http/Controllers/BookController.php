<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    private $book;
    public function __construct(Book $book)
    {
        $this->book = $book;

        $this->middleware('auth', ['except' => [
            'index',
            'show'
        ]]);
    }
    public function index()
    {
        $books = $this->book->orderBy('id', 'ASC')->paginate(10);

        return view('books.index', compact('books'))->with('images');
    }
    // create new book view
    public function create()
    {
        return view('books.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'isbn' => 'required',
        ]);
        $book = $this->book->create([
            'name' => $request->name,
            'author' =>  $request->author,
            'isbn' =>  $request->isbn,
        ]);
        $images = [];
        if ($request->images) {
            foreach ($request->images as $key => $image) {
                $file_name = rand(1, 1000) . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $file_name);
                $images[$key]['name'] =  $file_name;
            }
            foreach($images as $img){
                $book->images()->createMany([$img]);
            }
        }

        return redirect()->route('books.index')->with('images');
    }
    public function show(Book $book)
    {
        return view('books.show', compact('book'))->with('images');
    }
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'isbn' => 'required',
        ]);
        
        $excluded = $book->images->filter(function ($item) {
            return !empty($item['id']);
        });
        $book->images()->whereNotIn('id', $excluded->pluck('id'))->delete();
        $images = [];
        if ($request->images) {
            foreach ($request->images as $key => $image) {
                $file_name = rand(1, 1000) . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $file_name);
                $images[$key]['name'] =  $file_name;
            }
            foreach($images as $img){
                $book->images()->createMany([$img]);
            }
        }

        $book->update([
            'name' => $request->name,
            'author' =>  $request->author,
            'isbn' =>  $request->isbn,
        ]);

        return redirect()->route('books.show', $book);
    }
    public function destroy(Book $book)
    {
        foreach($book->images as $item){
            Storage::delete('public/images/' . $item->name);
        }
        $book->delete();

        return redirect()->route('books.index');
    }
}
