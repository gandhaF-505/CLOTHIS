<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            [
                'name' => 'Heavyweight Cotton Blank',
                'price' => '790.000',
                'image' => 'sablon1.png',
                'description' => 'Bahan cotton premium dengan struktur kokoh dan nyaman digunakan.'
            ],

            [
                'name' => 'Premium Cotton Tee',
                'price' => '650.000',
                'image' => 'sablon2.png',
                'description' => 'Kaos cotton dengan bahan lembut dan cocok untuk custom printing.'
            ],

            [
                'name' => 'Custom Oversized Tee',
                'price' => '850.000',
                'image' => 'sablon3.png',
                'description' => 'Model oversized yang cocok untuk desain custom.'
            ],
        ];

        return view('products.index', compact('products'));
    }
}
