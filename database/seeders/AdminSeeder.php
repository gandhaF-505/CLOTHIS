<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@clothing.com'],
            [
                'name' => 'Admin CLOTHIS',
                'password' => 'password',
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'produksi@clothing.com'],
            [
                'name' => 'Admin Produksi',
                'password' => 'password',
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'keuangan@clothing.com'],
            [
                'name' => 'Admin Keuangan',
                'password' => 'password',
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'operasional@clothing.com'],
            [
                'name' => 'Admin Operasional',
                'password' => 'password',
                'role' => 'admin',
            ]
        );
    }
}
