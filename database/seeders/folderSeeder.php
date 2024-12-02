<?php

namespace Database\Seeders;
use App\Models\Folder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class folderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $folder = Folder::create([
            'name' => 'Folder 4',
            'description' => 'This is a folder',
            'user_id' => '4',
        ]);
        $folder = Folder::create([
            'name' => 'Folder 2',
            'description' => 'This is a folder',
            'user_id' => '4',
        ]);
        $folder = Folder::create([
            'name' => 'Folder 3',
            'description' => 'This is a folder',
            'user_id' => '4',
        ]);
        $folder = Folder::create([
            'name' => 'Folder 5',
            'description' => 'This is a folder',
            'user_id' => '4',
        ]);
    }
}
