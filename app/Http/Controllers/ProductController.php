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
                'image' => 'sablon.png',
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
            ]
        ];

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $products = [
            1 => [
                'name' => 'Heavyweight Cotton Blank',
                'price' => '790.000',
                'image' => 'sablon.png',
                'description' => 'Bahan cotton premium dengan struktur kokoh dan nyaman digunakan.'
            ],
            2 => [
                'name' => 'Premium Cotton Tee',
                'price' => '650.000',
                'image' => 'sablon2.png',
                'description' => 'Kaos cotton dengan bahan lembut dan cocok untuk custom printing.'
            ],
            3 => [
                'name' => 'Custom Oversized Tee',
                'price' => '850.000',
                'image' => 'sablon3.png',
                'description' => 'Model oversized yang cocok untuk desain custom.'
            ]
        ];

        if (!isset($products[$id])) {
            abort(404);
        }

        $product = $products[$id];

        return view('products.show', compact('product'));
    }
}
