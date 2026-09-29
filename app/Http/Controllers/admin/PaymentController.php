<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('order.product')
            ->latest()
            ->get();

        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        return view('admin.payments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => ['required', 'exists:orders,id'],
            'method' => ['required', 'string'],
            'amount' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'string'],
            'proof' => ['nullable', 'string'],
        ]);

        Payment::create($validated);

        return redirect()
            ->route('admin.payments.index')
            ->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function show(string $payment)
    {
        $payment = Payment::with('order.product')
            ->findOrFail($payment);

        return view('admin.payments.show', compact('payment'));
    }

    public function edit(string $payment)
    {
        $payment = Payment::findOrFail($payment);

        return view('admin.payments.edit', compact('payment'));
    }

    public function update(Request $request, string $payment)
    {
        $payment = Payment::findOrFail($payment);

        $validated = $request->validate([
            'method' => ['required', 'string'],
            'amount' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'string'],
            'proof' => ['nullable', 'string'],
        ]);

        $payment->update($validated);

        return redirect()
            ->route('admin.payments.index')
            ->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroy(string $payment)
    {
        $payment = Payment::findOrFail($payment);

        $payment->delete();

        return redirect()
            ->route('admin.payments.index')
            ->with('success', 'Pembayaran berhasil dihapus.');
    }

    public function action(Request $request)
    {
        $payment = Payment::with('order')
            ->findOrFail($request->payment_id);

        if ($request->action === 'berhasil') {
            $payment->update([
                'status' => 'Berhasil',
            ]);

            $payment->order->update([
                'status' => 'Pembayaran Berhasil',
            ]);

            return back()->with(
                'success',
                'Pembayaran berhasil diverifikasi.'
            );
        }

        return back();
    }
}
