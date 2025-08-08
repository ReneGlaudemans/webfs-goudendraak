<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_Dish;
use App\Exports\SalesExport;
use Maatwebsite\Excel\Facades\Excel;


class SalesController extends Controller
{
    public function download(Request $request)
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

        return Excel::download(new SalesExport($sales), 'sales-overview.xlsx');
    }
}