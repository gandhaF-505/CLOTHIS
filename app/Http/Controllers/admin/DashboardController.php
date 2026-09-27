<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            [
                'icon' => 'box',
                'label' => 'Total Produk',
                'value' => Product::count(),
            ],
            [
                'icon' => 'shopping',
                'label' => 'Total Pesanan',
                'value' => Order::count(),
            ],
            [
                'icon' => 'image',
                'label' => 'Pesanan Menunggu',
                'value' => Order::where('status', 'Menunggu Konfirmasi')->count(),
            ],
            [
                'icon' => 'card',
                'label' => 'Pembayaran',
                'value' => 0,
            ],
        ];

        $orders = [];

        return view('admin.dashboard', compact('stats', 'orders'));
    }
}
