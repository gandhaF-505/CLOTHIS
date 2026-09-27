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
        return view('admin.products.index', [
            'products' => []
        ]);
    }

    public function createProduct()
    {
        return view('admin.products.create');
    }

    public function editProduct(int $id)
    {
        return view('admin.products.edit', [
            'productId' => $id
        ]);
    }

    public function orders()
    {
        return view('admin.orders.index', [
            'orders' => []
        ]);
    }

    public function orderDetail(string $code)
    {
        return view('admin.orders.show', [
            'code' => $code
        ]);
    }

    public function designs()
    {
        return view('admin.designs.index', [
            'designs' => []
        ]);
    }

    public function payments()
    {
        return view('admin.payments.index', [
            'payments' => []
        ]);
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
        $action = $request->input('action');

        if ($action === 'create') {

            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'string', 'min:6'],
            ]);

            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role' => 'admin',
            ]);

            return redirect()
                ->route('admin.admins.index')
                ->with('success', 'Admin berhasil ditambahkan.');
        }

        if ($action === 'edit') {

            $admin = User::where('role', 'admin')
                ->findOrFail($request->admin_id);

            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    'unique:users,email,' . $admin->id,
                ],
                'password' => ['nullable', 'string', 'min:6'],
            ]);

            $admin->name = $validated['name'];
            $admin->email = $validated['email'];

            if (!empty($validated['password'])) {
                $admin->password = $validated['password'];
            }

            $admin->save();

            return redirect()
                ->route('admin.admins.index')
                ->with('success', 'Admin berhasil diperbarui.');
        }

        return back()->with(
            'success',
            'Perubahan admin berhasil diproses.'
        );
    }

    public function placeholder(Request $request)
    {
        return back()->with(
            'success',
            'Perubahan berhasil diproses.'
        );
    }
}
