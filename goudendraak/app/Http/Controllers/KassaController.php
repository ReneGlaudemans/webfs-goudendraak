<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order_Dish;

class KassaController extends Controller
{
    public function index(Request $request)
    {
        $beginDate = $request->input('begindate');
        $endDate = $request->input('enddate');

        $query = Order_Dish::with('dish', 'order');

        if ($beginDate && $endDate) {
            $query->whereBetween('created_at', [$beginDate, $endDate]);
        }

        $sales = $query->get();
        $total = 0;
        $price = 0;

        $grouped = $sales->groupBy(function ($item) {
            $dishName = $item->dish ? $item->dish->name : 'Onbekend';
            return $item->created_at->format('Y-m-d') . '-' . $dishName;
        });

        $overview = [];
        foreach ($grouped as $key => $items) {
            $first = $items->first();
            $amount = $items->sum('quantity');
            $price = $first->dish ? $first->dish->price : 0;
            $subTotal = $amount * $price;
            $total += $subTotal;
            $overview[] = [
                'saleDate' => $first->created_at->format('Y-m-d'),
                'naam' => $first->dish ? $first->dish->name : 'Onbekend',
                'price' => $price,
                'amount' => $amount,
                'subTotal' => $subTotal,
            ];
        }
        $totalExVat = ($total / 106) * 100;
        $vat = $total - $totalExVat;
        $categories = Category::with('dishes')->get();
        return view("kassa.index", compact('categories', 'overview', 'total', 'totalExVat', 'vat', 'beginDate', 'endDate'));
    }
}