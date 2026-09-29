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
            $validated['design'] = $request->file('design')
                ->store('designs', 'public');
        }

        $validated['status'] = 'Menunggu Konfirmasi';
        $validated['design_status'] = 'Menunggu Approval';

        Order::create($validated);

        return redirect()
            ->route('orders.index')
            ->with(
                'success',
                'Pesanan berhasil dibuat dan menunggu persetujuan admin.'
            );
    }

    public function show(string $order)
    {
        $order = Order::with(['product', 'payment'])
            ->findOrFail($order);

        return view('orders.show', compact('order'));
    }

    public function edit(string $order)
    {
        $order = Order::findOrFail($order);
        $products = Product::latest()->get();

        return view('orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, string $order)
    {
        $order = Order::findOrFail($order);

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
            $validated['design'] = $request->file('design')
                ->store('designs', 'public');

            $validated['design_status'] = 'Menunggu Approval';
        }

        $order->update($validated);

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function destroy(string $order)
    {
        $order = Order::findOrFail($order);

        $order->delete();

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pesanan berhasil dihapus.');
    }

    public function payment(string $order)
    {
        $order = Order::with('product')
            ->findOrFail($order);

        return view('orders.payment', compact('order'));
    }

    public function paymentStore(Request $request, string $order)
    {
        $order = Order::with('product')
            ->findOrFail($order);

        $validated = $request->validate([
            'method' => ['required', 'string'],
            'proof' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        ]);

        $proof = $request->file('proof')
            ->store('payments', 'public');

        $amount = $order->product->price * $order->quantity;

        $order->payment()->updateOrCreate(
            ['order_id' => $order->id],
            [
                'method' => $validated['method'],
                'amount' => $amount,
                'status' => 'Menunggu Verifikasi',
                'proof' => $proof,
            ]
        );

        $order->update([
            'status' => 'Menunggu Konfirmasi Pembayaran',
        ]);

        return redirect()
            ->route('orders.show', $order->id)
            ->with(
                'success',
                'Pembayaran berhasil dikirim dan sedang menunggu konfirmasi admin.'
            );
    }
}
