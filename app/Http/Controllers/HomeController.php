<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $authorCount = Author::count(); // Get the number of authors
        $bookCount = Book::count(); // Get the number of books

        return view('welcome', compact('authorCount', 'bookCount'));
    }
}
