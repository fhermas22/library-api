<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the books.
     */
    public function index()
    {
        // Get all books
        $books = Book::all();

        // Response
        return response()->json(
            $books,
            200
        );
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(Request $request)
    {
        // Create & Store data
        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'description' => $request->description,
        ]);

        // Response
        return response()->json(
            ['book' => $book, 'message' => "Livre créé avec succès"],
            200
        );
    }

    /**
     * Display the specified book.
     */
    public function show(Book $book)
    {
        // Search specified book in storage
        $book = Book::findOrFail($book);

        // Response
        return response()->json(
            $book,
            200
        );
    }

    /**
     * Update the specified book in storage.
     */
    public function update(Request $request, Book $book)
    {
        // Search specified book
        $book = Book::findOrFail($book);

        // Modify & Save specified book
        $book->update(
            $request->only(['title', 'author', 'year', 'description'])
        );

        // Response
        return response()->json(
            ['message' => "Livre modifié avec succès", 'book' => $book],
            200
        );
    }

    /**
     * Remove the specified book from storage.
     */
    public function destroy(Book $book)
    {
        // Search specified book
        $book = Book::findOrFail($book);

        // Delete a specified book
        $book->delete();

        // Response
        return response()->json(
            ['message' => "Livre supprimé avec succès"],
            200
        );
    }
}
