<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = user::create([
            'name' => 'Admin',
            'phone' => '1234567890',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('admin');
    }
}
