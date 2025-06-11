<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
class KassaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $menuItemsType = Menu::select('soortgerecht')->distinct()->get();
        $menuItems = Menu::orderBy('id','asc')->orderBy('menunummer','asc')->orderBy('menu_toevoeging','asc')->get();
        return view( 'kassa.index',compact('menuItems','menuItemsType'));
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
