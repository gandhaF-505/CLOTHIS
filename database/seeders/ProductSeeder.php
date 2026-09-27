<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Heavyweight Cotton Blank',
            'price' => 790000,
            'description' => 'Bahan cotton premium dengan struktur kokoh dan nyaman digunakan.',
            'image' => 'sablon.png',
        ]);

        Product::create([
            'name' => 'Premium Cotton Tee',
            'price' => 650000,
            'description' => 'Kaos cotton dengan bahan lembut dan cocok untuk custom printing.',
            'image' => 'sablon2.png',
        ]);

        Product::create([
            'name' => 'Custom Oversized Tee',
            'price' => 850000,
            'description' => 'Model oversized yang cocok untuk desain custom.',
            'image' => 'sablon3.png',
        ]);
    }
}
