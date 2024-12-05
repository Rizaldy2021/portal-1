<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class fileController extends Controller
{
    public function index(Request $request): View
    {

        $user = DB::table('users')
            ->leftjoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftjoin('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->select('users.*', 'roles.name as role')
            ->where('users.id', Auth::user()->id)->first();

        if($user->role == 'admin') {
            $files = File::all();
            $folders = Folder::with(['children','files'])->whereNull('parent_id')->get();
        } else {
            $files = File::where('user_id', Auth::user()->id)->get();
            $folders = Folder::with(['children','files'])
                ->where('user_id', Auth::user()->id)
                ->whereNull('parent_id')
                ->get();
        }

        // $folders = Folder::with(['children','files'])->whereNull('parent_id')->get();

        return view('test', compact('files', 'folders'));
    }

    public function view($id)
    {
        $file = File::findOrFail($id);
        $fileUrl = Storage::url($file->path);
        return view('view-file', compact('file','fileUrl'));
    }
}
