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

        // Maak een nieuwe order aan
        $order = Order::create([
            'table_id' => 1,
        ]);

        // Voeg de gerechten toe
        foreach ($validated['dishes'] as $dishId => $amount) {
            if ($amount > 0) {
                $remark = $request->input('remarks.' . $dishId); // Per dish remark
                Order_Dish::create([
                    'order_id' => $order->id,
                    'dish_id' => $dishId,
                    'quantity' => $amount,
                    'remark' => $remark, // Only if your Order_Dish model/table has a 'remark' column
                ]);
            }
        }

        return redirect()->back()->with('success', 'Verkoop succesvol!');
    }
}