<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('users')->insertGetId([
            'full_name' => 'DORA',
            'email' => 'info@dora.uz',
            'password' => Hash::make('dOR@_5324'),
            'role' => 2, // Superadmin
            'phone' => '+998945135324',
            'status' => 1,
            'last_login' => now(),
            'region' => 'Tashkent',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
     DB::table('users')->insertGetId([
            'full_name' => 'Usmonov Ismoil',
            'email' => 'ismoil_007u@gmail.com',
            'password' => Hash::make('ismoil_007u@gmail.com'),
            'role' => 2, // Superadmin
            'phone' => '+998919579717',
            'status' => 1,
            'last_login' => now(),
            'region' => 'Tashkent',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
