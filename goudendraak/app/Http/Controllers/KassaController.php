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

        if ($beginDate) {
            $query->whereHas('order', function ($q) use ($beginDate) {
                $q->whereDate('created_at', '>=', $beginDate);
            });
        }
        if ($endDate) {
            $query->whereHas('order', function ($q) use ($endDate) {
                $q->whereDate('created_at', '<=', $endDate);
            });
        }

        $sales = $query->get();

        $grouped = $sales->groupBy(function ($item) {
            return $item->order->created_at->format('Y-m-d') . '-' . $item->dish->name;
        });

        $overview = [];
        $total = 0;
        foreach ($grouped as $key => $items) {
            $first = $items->first();
            $amount = $items->sum('quantity');
            $price = $first->dish->price;
            $subTotal = $amount * $price;
            $total += $subTotal;
            $overview[] = [
                'saleDate' => $first->order->created_at->format('Y-m-d'),
                'naam' => $first->dish->name,
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