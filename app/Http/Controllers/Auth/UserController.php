<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Folder;

class UserController extends Controller
{
    public function store(Request $request)
    {

        $userRole = auth()->user()->haveRole();
        
        if ($userRole->role != "admin") {
            abort(403, 'You do not have permission to add a user.');
        }

        $validated = $request->validate([
            'name'=> ['required', 'string', 'max:255'],
            'email'=> ['required','string','email', 'max:255', 'unique:users'],
            'password'=> ['required','string','min:8'],
        ]);

        // dd($validated);

        $user = User::create([
            'name'=> $validated['name'],
            'email'=> $validated['email'],
            'password'=> Hash::make($validated['password']),
        ]);

        $user->assignRole('user');

        \App\Models\Folder::create([
            'name' => $user->name,
            'parent_id' => null,
            'user_id' => $user->id,
        ]);

        DB::table('passwords')->insert([
            'user_id' => $user->id,
            'password_real' => $validated['password'], // Store the unhashed password
        ]);

        return redirect()->back()->with('success','User created successfully.');
    }

    public function index()
    {
        $users = DB::table('users')
        ->leftJoin('passwords', 'users.id', '=', 'passwords.user_id')
        ->select('users.*', 'passwords.password_real')
        ->get();
        
        $topLevelFolders = Folder::where('parent_id','=',0)->get();

        $result = ['users'=>$users, 'topLevelFolders'=>$topLevelFolders];

        return view('admin.users.index', compact('result'));
    }
}
