<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'User100',
            'email' => 'user100@gmail.com',
            'password' => bcrypt('user'),
        ]);

        $user->assignRole('user');

        // $admin = User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('admin'),
        // ]);

        // $admin->assignRole('admin');
    }
}
