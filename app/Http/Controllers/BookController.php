<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

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
        $books = $this->book->paginate(10);

        return view('books.index', compact('books'));
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
            'image' => '',
        ]);
        $file_name = time().'.'.$request->image->extension();
        $request->image->storeAs('public/images', $file_name);
        $this->book->create([
            'name' => $request->name,
            'author' =>  $request->author,
            'isbn' =>  $request->isbn,
            'image' => $file_name,
        ]);
        
        return redirect()->route('books.show');
    }
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
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
            'image' => '',
        ]);
        $file_name = time().'.'.$request->image->extension();
        $request->image->storeAs('public/images', $file_name);
        $book->update([
            'name' => $request->name,
            'author' =>  $request->author,
            'isbn' =>  $request->isbn,
            'image' => $file_name,
        ]);

        return redirect()->route('books.show', $book);
    }
    public function destroy(Book $book)
    {
        $book->delete();
        
        return redirect()->route('books.index');
    }
}
