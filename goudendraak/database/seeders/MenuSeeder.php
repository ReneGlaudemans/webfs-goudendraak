<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        Menu::insert([
            [
                'id' => 1,
                'menunummer' => 1,
                'menu_toevoeging' => null,
                'naam' => 'Soep Ling Fa',
                'price' => 3.8,
                'soortgerecht' => 'SOEP',
                'beschrijving' => null
            ],
            [
                'id' => 2,
                'menunummer' => 2,
                'menu_toevoeging' => null,
                'naam' => 'Kippensoep',
                'price' => 2.9,
                'soortgerecht' => 'SOEP',
                'beschrijving' => ''
            ]
        ]);
    }
}
