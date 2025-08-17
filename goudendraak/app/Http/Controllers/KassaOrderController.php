<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Dish;

class KassaOrderController extends Controller
{
    public function pay(Request $request)
    {
        $validated = $request->validate([
            'dishes' => 'required|array',
        ]);

        // Filter gerechten met hoeveelheid > 0
        $filteredDishes = array_filter($validated['dishes'], function ($amount) {
            return $amount > 0;
        });

        // Maak alleen een order aan als er minimaal één gerecht is
        if (count($filteredDishes) === 0) {
            return redirect()->back()->withErrors(['dishes' => 'Selecteer minimaal één gerecht.']);
        }

        $order = Order::create([
            'table_id' => 1,
        ]);

        foreach ($filteredDishes as $dishId => $amount) {
            $remark = $request->input('remarks.' . $dishId);
            Order_Dish::create([
                'order_id' => $order->id,
                'dish_id' => $dishId,
                'quantity' => $amount,
                'remark' => $remark,
            ]);
        }

        return redirect()->back()->with('success', 'Verkoop succesvol!');
    }
}