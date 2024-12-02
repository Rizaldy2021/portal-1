<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;

class folderController extends Controller
{
    public function show($id)
    {
        $folder = Folder::with('files')->findOrFail($id); // Pastikan relasi 'files' sudah diatur di model
        return view('folder.show', compact('folder'));
    }
}
