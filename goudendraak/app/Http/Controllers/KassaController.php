<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class KassaController extends Controller
{
    public function index()
    {
        $categories = Category::with('dishes')->get();
        return view("kassa.index",compact('categories'));
    }
}