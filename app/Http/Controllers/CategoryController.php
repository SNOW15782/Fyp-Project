<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::get();

        $categories->each(function ($category) {
            $category->totalProperties = $category->properties->count();
        });

        return view('adminView.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('adminView.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        Category::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function show()
    {
        $categories = Category::get(['name']);

        return view('adminView.categories.index', compact('categories'));
    }

    // Display the category edit form
    public function edit(Category $category)
    {
        return view('adminView.categories.edit', compact('category'));
    }

    // Update the category
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Delete the category
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

}
