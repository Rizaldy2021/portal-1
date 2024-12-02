<?php

namespace Database\Seeders;
use App\Models\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class fileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = File::create([
            'name' => 'konsumsi.pdf',
            'path' => 'test/konsumsi.pdf',
            'type' => 'file/pdf',
            'size' => 1024,
            'user_id' => 4,
            'folder_id' => 1
        ]);
        $file = File::create([
            'name' => 'konsumsi1.pdf',
            'path' => 'test/konsumsi1.pdf',
            'type' => 'file/pdf',
            'size' => 1024,
            'user_id' => 4,
            'folder_id' => 1
        ]);
        $file = File::create([
            'name' => 'konsumsi2.pdf',
            'path' => 'test/konsumsi2.pdf',
            'type' => 'file/pdf',
            'size' => 1024,
            'user_id' => 4,
            'folder_id' => 1
        ]);
        $file = File::create([
            'name' => 'konsumsi3.pdf',
            'path' => 'test/konsumsi3.pdf',
            'type' => 'file/pdf',
            'size' => 1024,
            'user_id' => 4,
            'folder_id' => 1
        ]);
        $file = File::create([
            'name' => 'konsumsi4.pdf',
            'path' => 'test/konsumsi4.pdf',
            'type' => 'file/pdf',
            'size' => 1024,
            'user_id' => 4,
            'folder_id' => 1
        ]);
    }
}
