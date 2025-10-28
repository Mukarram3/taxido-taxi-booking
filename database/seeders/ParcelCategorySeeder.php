<?php

namespace Database\Seeders;

use App\Models\ParcelCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParcelCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParcelCategory::create([
           'title' => 'Documents',
        ]);
        ParcelCategory::create([
            'title' => 'Furniture',
        ]);
        ParcelCategory::create([
            'title' => 'Appliances',
        ]);
        ParcelCategory::create([
            'title' => 'Boxes/Moving',
        ]);
        ParcelCategory::create([
            'title' => 'Bikes/Sports',
        ]);
        ParcelCategory::create([
            'title' => 'Other',
        ]);
    }
}
