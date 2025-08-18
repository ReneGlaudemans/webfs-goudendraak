<?php

namespace Database\Seeders;

use App\Models\Side;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Side::create([
            'side' => 'Witte rijst'
        ]);
        Side::create([
            'side' => 'Nasi Goreng'
        ]);
        Side::create([
            'side' => 'Bami Goreng'
        ]);
        Side::create([
            'side' => 'Chinese Bami'
        ]);
        Side::create([
            'side' => 'Mihoen Goreng'
        ]);
    }
}
