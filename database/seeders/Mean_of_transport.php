<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Mean_of_transport extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Mean_of_transport::create([
            'name' => 'car',
        ]);
        \App\Models\Mean_of_transport::create([
            'name' => 'bicycle',
        ]);
        \App\Models\Mean_of_transport::create([
            'name' => 'plane',
        ]);
        \App\Models\Mean_of_transport::create([
            'name' => 'train',
        ]);
        \App\Models\Mean_of_transport::create([
            'name' => 'boat',
        ]);
        \App\Models\Mean_of_transport::create([
            'name' => 'pedestrian',
        ]);
        \App\Models\Mean_of_transport::create([
            'name' => 'motorcycle',
        ]);
    }
}
