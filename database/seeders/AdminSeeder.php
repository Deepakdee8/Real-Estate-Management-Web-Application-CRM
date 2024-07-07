<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'customer_id' => 'Admin001',
            'name' => 'Deepak',
            'address' => 'Mysore',
            'email' => 'admin@gmail.com',
            'phone' => '9876543210',
            'role' => 'Admin',
            'password' => Hash::make('password')
        ]);
    }
}
