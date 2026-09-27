<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $orders = Order::latest()->take(3)->get();

        foreach ($orders as $order) {
            Payment::updateOrCreate(
                ['order_id' => $order->id],
                [
                    'method' => 'Transfer BCA',
                    'amount' => 150000,
                    'status' => 'Menunggu Verifikasi',
                    'proof' => null,
                ]
            );
        }
    }
}
