<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class fileController extends Controller
{
    public function index(Request $request): View
    {
        $files = File::all();
        $folders = Folder::with(['children','files'])->whereNull('parent_id')->get();
        return view('test', compact('files', 'folders'));
    }

    public function view($id)
    {
        $file = File::findOrFail($id);
        $fileUrl = Storage::url($file->path);
        return view('view-file', compact('file','fileUrl'));
    }

    // public function view(File $file)
    // {
    //     // Pastikan pengguna memiliki izin
    //     if (Auth::id() !== $file->user_id && Auth::user()->role !== 'admin') {
    //         abort(403, 'Access denied');
    //     }

    //     $fileUrl = Storage::url($file->path);
    //     return view('view-file', compact('file', 'fileUrl'));
    // }
}
