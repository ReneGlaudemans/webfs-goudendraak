<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order_Dish;
use App\Models\Order;
use App\Models\Dish;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SalesExport;
use Illuminate\Support\Facades\Mail;

class EmailDailySalesSummary extends Command
{
    protected $signature = 'sales:email-daily-summary';
    protected $description = 'Email daily sales summary as Excel file';

    public function handle()
    {
        $today = Carbon::today();
        $orders = Order::whereDate('created_at', $today)->pluck('id');
        $sales = Order_Dish::whereIn('order_id', $orders)->with('dish')->get();

        // Export sales to Excel
        $fileName = 'sales-summary-' . $today->format('Y-m-d') . '.xlsx';
        Excel::store(new SalesExport($sales), $fileName, 'local');

        // Email the file
        Mail::raw('Zie bijlage voor het verkoopoverzicht van vandaag.', function ($message) use ($fileName) {
            $message->to('rra.glaudemans@student.avans.nl')
                ->subject('Dagelijks verkoopoverzicht')
                ->attach(storage_path('app/' . $fileName));
        });

        $this->info('Daily sales summary emailed!');
    }
}