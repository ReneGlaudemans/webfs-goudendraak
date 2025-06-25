<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class KassaOrderController extends Controller{
    public function pay(Request $request)
{
    $validated = $request->validate([
        'dishes' => 'required|array',
        'remark' => 'nullable|string|max:255',
    ]);

    // Maak een nieuwe order aan
    $order = \App\Models\Order::create([
        'remark' => $validated['remark'] ?? null,
        // eventueel andere velden zoals tafel_id, user_id, etc.
    ]);

    // Voeg de gerechten toe
    foreach ($validated['dishes'] as $dishId => $amount) {
        if ($amount > 0) {
            \App\Models\Order_Dish::create([
                'order_id' => $order->id,
                'dish_id' => $dishId,
                'quantity' => $amount,
            ]);
        }
    }

    return redirect()->back()->with('success', 'Verkoop succesvol!');
}
}