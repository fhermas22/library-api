<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the books.
     */
    public function index(Request $request)
    {
        // Filter inputs
        $sortBy = $request->input('sort_by');
        $order = $request->input('order', 'asc');
        // Pagination inputs
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);

        $query = Book::query();

        // Apply the filters (title or author, order) and return corresponding books
        if ($sortBy && in_array($sortBy, ['title', 'author', 'year'])) {
            $query->orderBy($sortBy, $order);
        }

        // Get the books according to the number per page and the page index
        $books = $query->paginate($perPage, ['*'], 'page', $page);

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
        $currentYear = date('Y');

        // Validation
        $validated = $request->validate([
            'title' => 'required|string|min:3',
            'author' => 'nullable|string',
            'year' => ['nullable', 'numeric', 'lt:'.$currentYear],
            'description' => 'nullable|string',
        ], [
            'title.required' => 'Le titre est obligatoire.',
            'title.min' => 'Le titre doit contenir au moins :min caractères.',
            'year.numeric' => "L'année doit être numérique.",
            'year.lt' => "L'année doit être inférieure à $currentYear.",
        ]);

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
            201
        );
    }

    /**
     * Display the specified book.
     */
    public function show(Book $book)
    {
        // Search specified book in storage
        $book = Book::findOrFail($book->id);

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
        $book = Book::findOrFail($book->id);

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
        $book = Book::findOrFail($book->id);

        // Delete a specified book
        $book->delete();

        // Response
        return response()->json(
            ['message' => "Livre supprimé avec succès"],
            204
        );
    }

    /**
     * Search a specified book by title or author.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Verify if query is provided
        if (empty($query)) {
            return response()->json(
                ['message' => "Veuillez fournir un mot-clé de recherche."],
                400
            );
        }

        // Search books by title or author
        $books = Book::where(function ($q) use ($query) {
            $q->where('title', 'LIKE', "%{$query}%")
              ->orWhere('author', 'LIKE', "%{$query}%");
        })->get();

        // If no books found
        if ($books->isEmpty()) {
            return response()->json(
                ['message' => "Aucun livre trouvé pour la recherche '$query'."],
                404
            );
        }

        // Response
        return response()->json(
            $books,
            200
        );
    }

    /**
     * Retrieve the list of categories attached to the specified book.
     */
    public function showCategories(Book $book)
    {
        // Search specified book
        $book = Book::findOrFail($book->id);

        // Get categories attached to the book
        $categories = $book->categories()->get();

        // If no categories are attached
        if ($categories->isEmpty()) {
            return response()->json(
                ['message' => "Aucune catégorie n'est actuellement associée à ce livre.", 'book_id' => $book->id, 'categories' => []],
                200
            );
        }

        // Response
        return response()->json(
            [
                'message' => 'Catégories récupérées avec succès',
                'book_id' => $book->id,
                'categories' => $categories
            ],
            200
        );
    }

    /**
     * Attach a category to the specified book.
     */
    public function attachCategory(Request $request, Book $book)
    {
        // Search specified book
        $book = Book::findOrFail($book->id);

        // Validation
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
        ], [
            'category_id.required' => 'L\'ID de la catégorie est obligatoire.',
            'category_id.exists' => 'La catégorie n\'existe pas.',
        ]);

        // Attach category to book (avoid duplicates)
        $book->categories()->syncWithoutDetaching([$validated['category_id']]);

        // Response
        return response()->json(
            ['message' => 'Catégorie ajoutée au livre avec succès', 'book' => $book->load('categories')],
            200
        );
    }

    /**
     * Detach a category from the specified book.
     */
    public function detachCategory(Request $request, Book $book)
    {
        // Search specified book
        $book = Book::findOrFail($book->id);

        // Validation
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
        ], [
            'category_id.required' => 'L\'ID de la catégorie est obligatoire pour la déliaison.',
            'category_id.exists' => 'La catégorie spécifiée n\'existe pas.',
        ]);

        $categoryIdToDetach = $validated['category_id'];

        // Verify if the category is attached to the book
        if (!$book->categories()->where('category_id', $categoryIdToDetach)->exists()) {
            return response()->json(
                ['message' => "Cette catégorie n'est pas attachée à ce livre."],
                404
            );
        }

        // Detach category from book
        $book->categories()->detach($categoryIdToDetach);

        // Response
        return response()->json(
            ['message' => 'Catégorie retirée du livre avec succès', 'book' => $book->load('categories')],
            200
        );
    }
}
