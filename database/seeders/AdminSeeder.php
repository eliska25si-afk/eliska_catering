<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Akun Admin pertama (tidak ada register untuk Admin).
     * Jalankan: php artisan db:seed --class=AdminSeeder
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@eliska.test'],
            [
                'name'              => 'Administrator',
                'password'          => 'admin12345', // di-hash otomatis oleh cast 'hashed'
                'role'              => User::ROLE_ADMIN,
                'email_verified_at' => now(),
            ]
        );
    }
}

