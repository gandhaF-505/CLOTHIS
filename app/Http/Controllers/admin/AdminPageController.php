<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')->latest()->take(3)->get();

        $totalPendapatan = Order::where('status', 'Disetujui')
            ->with('product')
            ->get()
            ->sum(function ($order) {
                return $order->product->price * $order->quantity;
            });

        $pesananAktif = Order::where('status', 'Menunggu Konfirmasi')->count();

        $stokRendah = Product::where('stock', '<=', 5)->count();

        $desainMenunggu = Order::where('status', 'Menunggu Konfirmasi')
            ->whereNotNull('design')
            ->count();

        return view('admin.dashboard', compact(
            'orders',
            'totalPendapatan',
            'pesananAktif',
            'stokRendah',
            'desainMenunggu'
        ));
    }
}
