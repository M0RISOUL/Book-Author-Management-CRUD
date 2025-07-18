<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        // Fetch all authors
        $authors = Author::all();

        // Pass the authors to the view
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|max:255',
            'birth_date' => 'required|date',
        ]);

        // Create a new author
        $author = Author::create($request->all());

        // Return the newly created author as a JSON response
        return response()->json([
            'success' => true,
            'author' => $author
        ]);
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|max:255',
            'birth_date' => 'required|date',
        ]);

        // Update the author's details
        $author->update($request->all());

        // Redirect to the authors index page after successful update
        return redirect()->route('authors.index');
    }

    public function destroy(Author $author)
    {
        // Delete the author
        $author->delete();

        // Redirect to the authors index page after successful deletion
        return redirect()->route('authors.index');
    }
}
