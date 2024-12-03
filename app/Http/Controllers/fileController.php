<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class fileController extends Controller
{
    public function index(Request $request): View
    {
        $files = File::all();
        $folders = Folder::all();
        return view('test', compact('files', 'folders'));
    }

    public function view($id)
    {
        $file = File::findOrFail($id);
        $fileUrl = Storage::url($file->path);
        return view('view-file', compact('file','fileUrl'));
    }
}
