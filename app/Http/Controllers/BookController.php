<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all books along with their authors
        $books = Book::with('author')->get();

        // Pass the books to the view
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        // Validate the request data
    $request->validate([
        'title' => 'required|max:255',
        'author_id' => 'required|exists:authors,id',
        'published_date' => 'required|date',
    ]);

    // Create a new book
    $book = Book::create($request->all());

    // Return a JSON response with success status
    return response()->json([
        'success' => true,
        'book' => $book
    ]);
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'published_date' => 'required|date',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
