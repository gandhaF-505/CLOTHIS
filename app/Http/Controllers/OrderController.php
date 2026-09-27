<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::latest()->get();

        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'color' => ['required', 'string'],
            'size' => ['required', 'string'],
            'model' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:1'],
            'design' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'notes' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('design')) {
            $validated['design'] = $request
                ->file('design')
                ->store('designs', 'public');
        }

        $validated['status'] = 'Menunggu Konfirmasi';

        Order::create($validated);

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pesanan berhasil dibuat.');
    }

    public function show(Order $order)
    {
        $order->load('product');

        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $products = Product::latest()->get();

        return view('orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'color' => ['required', 'string'],
            'size' => ['required', 'string'],
            'model' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:1'],
            'design' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'notes' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('design')) {
            $validated['design'] = $request
                ->file('design')
                ->store('designs', 'public');
        }

        $order->update($validated);

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pesanan berhasil dihapus.');
    }
}
