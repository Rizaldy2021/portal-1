<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class fileController extends Controller
{
    public function index(Request $request)
    {

        $user = DB::table('users')
            ->leftjoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftjoin('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->select('users.*', 'roles.name as role')
            ->where('users.id', Auth::user()->id)->first();

        if($user->role == 'admin') {
            $files = File::all();
        } else {
            $files = File::where('user_id', Auth::user()->id)->get();
        }

        // return view('test', compact('files'));
        return $files;
    }

    public function view($id)
    {
        $file = File::findOrFail($id);

        $this->authorizeAccess($file);
        
        $fileUrl = Storage::url($file->path);
        
        return view('view-file', compact('file','fileUrl'));
    }

    private function authorizeAccess(File $file)
    {
        $user = DB::table('users')
        ->leftjoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->leftjoin('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->select('users.*', 'roles.name as role')
        ->where('users.id', Auth::user()->id)->first();

        if ($file->user_id != $user->id && $user->role != 'admin') {
            abort(403, 'Unauthorized, fileController');
        }
    }
}
