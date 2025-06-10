<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;

class SalesSeeder extends Seeder
{
    public function run()
    {
        Sale::insert([
            [
                'id' => 1,
                'itemId' => 9,
                'amount' => 1,
                'saleDate' => '2020-04-11 12:19:38'
            ],
            [
                'id' => 2,
                'itemId' => 10,
                'amount' => 1,
                'saleDate' => '2020-04-11 12:19:38'
            ]
        ]);
    }
}
