<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;

class folderController extends Controller
{
    public function index()
    {
        $folders = Folder::with(['children','files'])->whereNull('parent_id')->get();
        return view('folder.index', compact('folders'));
    }

    public function show($id)
    {
        $folder = Folder::with(['children','files'])->findOrFail($id);
        $folders = Folder::where('parent_id', '=', $id)->get();
        return view('folder.show', compact('folder', 'folders'));
    }
}