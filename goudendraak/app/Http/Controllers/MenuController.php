<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class MenuController extends Controller
{
    public function exportToPDF()
    {
        $categories = Category::with(['dishes.offers'])->get();
        $pdf = Pdf::loadView('menu.pdf', compact('categories'));
        return $pdf->setPaper('a4', 'landscape')->download('menu.pdf');
    }
}
