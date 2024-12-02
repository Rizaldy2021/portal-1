<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class fileController extends Controller
{
    public function index(Request $request): View
    {
        $files = File::all();
        $folders = Folder::all();
        return view('test', compact('files', 'folders'));
    }
}
