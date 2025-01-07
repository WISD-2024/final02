<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class SellerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 創建一個管理員帳號
        $admin = User::create([
            'name' => 'Seller User',
            'email' => 'seller@example.com',
            'password' => bcrypt('password123'),
        ]);

    }
}