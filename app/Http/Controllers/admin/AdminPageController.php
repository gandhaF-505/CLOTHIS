<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminPageController extends Controller
{
    public function orders(Request $request)
    {
        $query = Order::with('product')->latest();

        if ($request->status === 'persetujuan') {
            $query->where('design_status', 'Menunggu Approval');
        }

        if ($request->status === 'disetujui') {
            $query->where('status', 'Pesanan Disetujui');
        }

        if ($request->status === 'produksi') {
            $query->where('status', 'Dalam Produksi');
        }

        if ($request->status === 'selesai') {
            $query->where('status', 'Selesai');
        }

        if ($request->status === 'riwayat') {
            $query->where('status', 'Selesai');
        }

        $orders = $query->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function orderDetail(string $code)
    {
        $order = Order::with(['product', 'payment'])
            ->findOrFail($code);

        return view('admin.orders.show', compact('order'));
    }

    public function designAction(Request $request)
    {
        $order = Order::findOrFail($request->order_id);

        if ($request->action === 'approve') {
            $order->update([
                'design_status' => 'Disetujui',
                'status' => 'Pesanan Disetujui',
            ]);

            return back()->with(
                'success',
                'Pesanan berhasil disetujui dan menunggu pembayaran.'
            );
        }

        if ($request->action === 'reject') {
            $order->update([
                'design_status' => 'Ditolak',
            ]);

            return back()->with(
                'success',
                'Desain berhasil ditolak.'
            );
        }

        return back();
    }

    public function orderAction(Request $request)
    {
        $order = Order::findOrFail($request->order_id);

        if ($request->action === 'selesai') {
            $order->update([
                'status' => 'Selesai',
            ]);

            return back()->with(
                'success',
                'Pesanan berhasil diselesaikan.'
            );
        }

        return back();
    }

    public function designs()
    {
        $designs = Order::with('product')
            ->whereNotNull('design')
            ->where('design_status', 'Menunggu Approval')
            ->latest()
            ->get();

        return view('admin.designs.index', compact('designs'));
    }

    public function admins()
    {
        $admins = User::where('role', 'admin')
            ->latest()
            ->get();

        return view('admin.admins.index', compact('admins'));
    }

    public function createAdmin()
    {
        return view('admin.admins.create');
    }

    public function editAdmin(int $id)
    {
        $admin = User::where('role', 'admin')
            ->findOrFail($id);

        return view('admin.admins.edit', compact('admin'));
    }

    public function adminAction(Request $request)
    {
        $admin = User::where('role', 'admin')
            ->findOrFail($request->id);

        if ($request->action === 'hapus') {
            $admin->delete();

            return back()->with(
                'success',
                'Admin berhasil dihapus.'
            );
        }

        return back();
    }

    public function placeholder(Request $request)
    {
        return back();
    }
}
