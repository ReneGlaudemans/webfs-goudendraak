<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Category;
use Illuminate\Http\Request;

class DishController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dishes = Dish::all();
        return view('dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dishes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => ['required', 'string', 'max:10', 'unique:dishes,id,' . ($id ?? 'NULL') . ',id'],
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0', 'max:999.99'],
            'category' => ['required', 'exists:categories,id']
        ]);

        try {
            Dish::create([
                'id' => $request->id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category
            ]);
            return redirect('dishes')->with('success', 'Gerecht succesvol toegevoegd!');
        } catch (\Exception $e) {
            return redirect('dishes')->withErrors(['error' => 'Gerecht kon niet worden toegevoegd.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dish = Dish::find($id);
        $category = Category::find($dish->category_id);
        return view('dishes.show', compact('dish', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dish = Dish::find($id);
        $categories = Category::all();
        return view('dishes.edit', compact('dish', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id' => ['required', 'string', 'max:10', 'unique:dishes,id,' . ($id ?? 'NULL') . ',id'],
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0', 'max:999.99'],
            'category' => ['required', 'exists:categories,id']
        ]);
        try {
            $dish = Dish::findOrFail($id);

            $dish->update([
                'id' => $request->id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category
            ]);
            return redirect('dishes/' . $dish->id)->with('success', 'Gerecht succesvol bijgewerkt!');
        } catch (\Exception $e) {
            return redirect('dishes/' . $id)->withErrors(['error' => 'Gerecht kon niet worden bijgewerkt.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Dish::findOrFail($id)->delete();
            return redirect('dishes')->with('success', 'Gerecht succesvol verwijderd!');
        } catch (\Exception $e) {
            return redirect('dishes')->withErrors(['error' => 'Gerecht kon niet worden verwijderd.']);
        }
    }
}
