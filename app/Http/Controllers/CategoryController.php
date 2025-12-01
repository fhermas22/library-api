<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        // Get all categories
        $categories = Category::all();

        // Response
        return response()->json(
            $categories,
            200
        );
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name' => 'required|string|min:3',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'name.min' => 'Le nom doit contenir au moins :min caractères.',
        ]);

        // Create & Store data
        $category = Category::create([
            'name' => $request->name,
        ]);

        // Response
        return response()->json(
            ['category' => $category, 'message' => "Catégorie créée avec succès"],
            201
        );
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category)
    {
        // Search specified category in storage
        $category = Category::findOrFail($category->id);

        // Response
        return response()->json(
            $category,
            200
        );
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Search specified category
        $category = Category::findOrFail($category->id);

        // Modify & Save specified category
        $category->update(
            [
                'name' => $request->name ?? $category->name,
            ]
        );

        // Response
        return response()->json(
            ['category' => $category, 'message' => "Catégorie mise à jour avec succès"],
            200
        );
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        // Search specified category
        $category = Category::findOrFail($category->id);

        // Delete a specified category
        $category->delete();

        // Response
        return response()->json(
            ['message' => "Catégorie supprimée avec succès"],
            204
        );
    }
}
