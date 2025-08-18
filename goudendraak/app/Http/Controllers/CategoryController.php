<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:categories'],
        ]);
        try {
            Category::create([
                'name' => $request->name,
            ]);
            return redirect('categories')->with('success', 'Categorie succesvol toegevoegd!');
        } catch (\Exception $e) {
            return redirect('categories')->withErrors(['error' => 'Categorie kon niet worden toegevoegd.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'unique:categories'],
        ]);
        try {
            $category = Category::findOrFail($id);
            $category->update([
                'name' => $request->name,
            ]);
            return redirect('categories/' . $category->id)->with('success', 'Categorie succesvol bijgewerkt!');
        } catch (\Exception $e) {
            return redirect('categories/' . $id)->withErrors(['error' => 'Categorie kon niet worden bijgewerkt.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Category::findOrFail($id)->delete();
            return redirect('categories')->with('success', 'Categorie succesvol verwijderd!');
        } catch (\Exception $e) {
            return redirect('categories')->withErrors(['error' => 'Categorie kon niet worden verwijderd.']);
        }

    }
}
