<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'stats' => [
                ['label' => 'Total Produk', 'value' => 24, 'icon' => 'box'],
                ['label' => 'Pesanan Baru', 'value' => 8, 'icon' => 'shopping'],
                ['label' => 'Menunggu Approval', 'value' => 5, 'icon' => 'image'],
                ['label' => 'Pembayaran Pending', 'value' => 3, 'icon' => 'card'],
            ],
        ]);
    }

    public function products()
    {
        return view('admin.products.index', [
            'products' => [
                ['id' => 1, 'name' => 'Kaos Cotton Combed 24s', 'category' => 'Kaos', 'price' => 'Rp85.000', 'stock' => 35, 'status' => 'Aktif'],
                ['id' => 2, 'name' => 'Jersey Custom', 'category' => 'Jersey', 'price' => 'Rp120.000', 'stock' => 20, 'status' => 'Aktif'],
                ['id' => 3, 'name' => 'Hoodie Custom', 'category' => 'Hoodie', 'price' => 'Rp150.000', 'stock' => 12, 'status' => 'Aktif'],
                ['id' => 4, 'name' => 'Kaos Oversize', 'category' => 'Kaos', 'price' => 'Rp100.000', 'stock' => 0, 'status' => 'Habis'],
            ],
        ]);
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
        return view('admin.orders.index', [
            'orders' => [
                ['code' => 'ORD-001', 'customer' => 'Budi Santoso', 'product' => 'Jersey Custom', 'total' => 'Rp600.000', 'status' => 'Menunggu'],
                ['code' => 'ORD-002', 'customer' => 'Sinta', 'product' => 'Kaos Cotton Combed', 'total' => 'Rp340.000', 'status' => 'Diproses'],
                ['code' => 'ORD-003', 'customer' => 'Raka', 'product' => 'Hoodie Custom', 'total' => 'Rp450.000', 'status' => 'Selesai'],
                ['code' => 'ORD-004', 'customer' => 'Dina', 'product' => 'Kaos Oversize', 'total' => 'Rp200.000', 'status' => 'Dibatalkan'],
            ],
        ]);
    }

    public function orderDetail(string $code)
    {
        return view('admin.orders.show', ['code' => $code]);
    }

    public function designs()
    {
        return view('admin.designs.index', [
            'designs' => [
                ['code' => 'DSN-001', 'customer' => 'Budi Santoso', 'order' => 'ORD-001', 'file' => 'jersey-budi.png', 'status' => 'Menunggu'],
                ['code' => 'DSN-002', 'customer' => 'Sinta', 'order' => 'ORD-002', 'file' => 'desain-sinta.pdf', 'status' => 'Disetujui'],
                ['code' => 'DSN-003', 'customer' => 'Raka', 'order' => 'ORD-003', 'file' => 'hoodie-raka.png', 'status' => 'Ditolak'],
            ],
        ]);
    }

    public function payments()
    {
        return view('admin.payments.index', [
            'payments' => [
                ['code' => 'PAY-001', 'order' => 'ORD-001', 'customer' => 'Budi Santoso', 'method' => 'Transfer Bank', 'amount' => 'Rp600.000', 'status' => 'Pending'],
                ['code' => 'PAY-002', 'order' => 'ORD-002', 'customer' => 'Sinta', 'method' => 'QRIS', 'amount' => 'Rp340.000', 'status' => 'Lunas'],
                ['code' => 'PAY-003', 'order' => 'ORD-003', 'customer' => 'Raka', 'method' => 'Transfer Bank', 'amount' => 'Rp450.000', 'status' => 'Lunas'],
            ],
        ]);
    }

    public function admins()
    {
        return view('admin.admins.index', [
            'admins' => [
                ['name' => 'Admin Utama', 'email' => 'admin@clothis.test', 'role' => 'Super Admin', 'status' => 'Aktif'],
                ['name' => 'Admin Operasional', 'email' => 'operasional@clothis.test', 'role' => 'Admin', 'status' => 'Aktif'],
            ],
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
