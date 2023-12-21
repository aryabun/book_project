<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookRequestController extends Controller
{
    public function index(Request $request)
    {
        return view('requests.index');
    }
    public function create(Request $request)
    {
        return view('requests.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'isbn' => 'required',
        ]);
        $book = $request->all();
        dd($book);
    }
}
