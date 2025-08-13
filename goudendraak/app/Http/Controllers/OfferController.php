<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Dish;

class OfferController extends Controller
{
    public function aanbiedingen()
    {
        $offers = Offer::with('dish')->whereDate('end_date', '>=', now())->get();
        return view('aanbiedingen.aanbiedingen', compact('offers'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::with('dish')->whereDate('end_date', '>=', now())->get();
        $dishes = Dish::all();
        return view('aanbiedingen.index', compact('offers', 'dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
