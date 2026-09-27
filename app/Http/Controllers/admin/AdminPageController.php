<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'stats' => [
                ['label' => 'Total Produk', 'value' => 0, 'icon' => 'box'],
                ['label' => 'Pesanan Baru', 'value' => 0, 'icon' => 'shopping'],
                ['label' => 'Menunggu Approval', 'value' => 0, 'icon' => 'image'],
                ['label' => 'Pembayaran Pending', 'value' => 0, 'icon' => 'card'],
            ],
            'orders' => [],
        ]);
    }

    public function products()
    {
        return view('admin.products.index', ['products' => []]);
    }

    public function createProduct()
    {
        return view('admin.products.create');
    }

    public function editProduct(int $id)
    {
        return view('admin.products.edit', ['productId' => $id]);
    }

    public function orders()
    {
        return view('admin.orders.index', ['orders' => []]);
    }

    public function orderDetail(string $code)
    {
        return view('admin.orders.show', ['code' => $code]);
    }

    public function designs()
    {
        return view('admin.designs.index', ['designs' => []]);
    }

    public function payments()
    {
        return view('admin.payments.index', ['payments' => []]);
    }

    public function admins()
    {
        return view('admin.admins.index', [
            'admins' => User::where('role', 'admin')->latest()->get(),
        ]);
    }

    public function createAdmin()
    {
        return view('admin.admins.create');
    }

    public function editAdmin(int $id)
    {
        return view('admin.admins.edit', ['adminId' => $id]);
    }

    public function placeholder(Request $request)
    {
        return back()->with('success', 'Perubahan berhasil diproses.');
    }
}
