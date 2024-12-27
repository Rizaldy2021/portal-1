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

        return $files;
    }


    public function view($id)
    {
        // Cari file berdasarkan ID, jika tidak ditemukan, akan melemparkan 404 error
        $file = File::findOrFail($id);
    
        // Periksa apakah user memiliki akses ke file ini
        // $this->authorizeAccess($file);
    
        // Periksa apakah file ada di storage
        if ( Storage::disk('public')->exists($file->path)) {
            // Mengembalikan file sebagai respons untuk ditampilkan atau diunduh
            return response()->file(Storage::disk('public')->path($file->path));
        }
    
        // Jika file tidak ditemukan, kembalikan ke halaman dengan pesan error atau redirect
        return redirect()->back()->withErrors(['File not found or no longer exists.']);
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
