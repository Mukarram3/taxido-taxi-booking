<?php

namespace Database\Seeders;

use App\Models\ParcelSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParcelSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParcelSubCategory::create([
           'category_id' => 1,
           'title' => 'Passports'
        ]);
        ParcelSubCategory::create([
            'category_id' => 1,
            'title' => 'Diplomas'
        ]);
        ParcelSubCategory::create([
            'category_id' => 1,
            'title' => 'Contracts'
        ]);
        ParcelSubCategory::create([
            'category_id' => 1,
            'title' => 'Invoices'
        ]);
        ParcelSubCategory::create([
            'category_id' => 1,
            'title' => 'Administrative documents'
        ]);
        ParcelSubCategory::create([
            'category_id' => 1,
            'title' => 'Books'
        ]);
        ParcelSubCategory::create([
            'category_id' => 1,
            'title' => 'Magazines'
        ]);
        ParcelSubCategory::create([
            'category_id' => 2,
            'title' => 'Sofas'
        ]);
        ParcelSubCategory::create([
            'category_id' => 2,
            'title' => 'Tables'
        ]);
        ParcelSubCategory::create([
            'category_id' => 2,
            'title' => 'Chairs'
        ]);
        ParcelSubCategory::create([
            'category_id' => 2,
            'title' => 'Wardrobes'
        ]);
        ParcelSubCategory::create([
            'category_id' => 2,
            'title' => 'Beds'
        ]);
        ParcelSubCategory::create([
            'category_id' => 2,
            'title' => 'Desks'
        ]);
        ParcelSubCategory::create([
            'category_id' => 2,
            'title' => 'Shelves'
        ]);
        ParcelSubCategory::create([
            'category_id' => 2,
            'title' => 'Dressers'
        ]);
        ParcelSubCategory::create([
            'category_id' => 3,
            'title' => 'Refrigerator'
        ]);
        ParcelSubCategory::create([
            'category_id' => 3,
            'title' => 'Washing machine'
        ]);
        ParcelSubCategory::create([
            'category_id' => 3,
            'title' => 'Dishwasher'
        ]);
        ParcelSubCategory::create([
            'category_id' => 3,
            'title' => 'Oven'
        ]);
        ParcelSubCategory::create([
            'category_id' => 3,
            'title' => 'Microwave'
        ]);
        ParcelSubCategory::create([
            'category_id' => 3,
            'title' => 'Television'
        ]);
        ParcelSubCategory::create([
            'category_id' => 3,
            'title' => 'Vacuum cleaner'
        ]);
        ParcelSubCategory::create([
            'category_id' => 4,
            'title' => 'Standard boxes'
        ]);
        ParcelSubCategory::create([
            'category_id' => 4,
            'title' => 'Book boxes'
        ]);
        ParcelSubCategory::create([
            'category_id' => 4,
            'title' => 'Dish boxes'
        ]);
        ParcelSubCategory::create([
            'category_id' => 4,
            'title' => 'Clothing boxes'
        ]);
        ParcelSubCategory::create([
            'category_id' => 4,
            'title' => 'Fragile boxes'
        ]);
        ParcelSubCategory::create([
            'category_id' => 5,
            'title' => 'Bikes'
        ]);
        ParcelSubCategory::create([
            'category_id' => 5,
            'title' => 'Skis'
        ]);
        ParcelSubCategory::create([
            'category_id' => 5,
            'title' => 'Surfboards'
        ]);
        ParcelSubCategory::create([
            'category_id' => 5,
            'title' => 'Gym equipment'
        ]);
        ParcelSubCategory::create([
            'category_id' => 5,
            'title' => 'Scooters'
        ]);
        ParcelSubCategory::create([
            'category_id' => 5,
            'title' => 'Camping gear'
        ]);
        ParcelSubCategory::create([
            'category_id' => 6,
            'title' => 'Tools'
        ]);
        ParcelSubCategory::create([
            'category_id' => 6,
            'title' => 'Materials'
        ]);
        ParcelSubCategory::create([
            'category_id' => 6,
            'title' => 'Spare parts'
        ]);
        ParcelSubCategory::create([
            'category_id' => 6,
            'title' => 'Musical instruments'
        ]);
        ParcelSubCategory::create([
            'category_id' => 6,
            'title' => 'Other'
        ]);
    }
}
