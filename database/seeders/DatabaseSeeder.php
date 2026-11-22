<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin pertama
        $this->call(AdminSeeder::class);

        // (Opsional) akun pelanggan contoh untuk demo
        User::updateOrCreate(
            ['email' => 'pelanggan@eliska.test'],
            [
                'name'     => 'Pelanggan Demo',
                'password' => 'pelanggan123',
                'role'     => User::ROLE_PELANGGAN,
            ]
        );
    }
}
