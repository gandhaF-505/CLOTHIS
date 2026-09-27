<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('product')->latest();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', '%' . $search . '%')
                    ->orWhereHas('product', function ($product) use ($search) {
                        $product->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        if ($request->status === 'produksi') {
            $query->where('status', 'Disetujui');
        }

        if ($request->status === 'menunggu') {
            $query->where('status', 'Menunggu Konfirmasi');
        }

        if ($request->status === 'selesai') {
            $query->where('status', 'Selesai');
        }

        $orders = $query->get();

        return view('admin.orders.index', compact('orders'));
    }
}
