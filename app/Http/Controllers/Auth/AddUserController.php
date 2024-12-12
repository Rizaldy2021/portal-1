<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AddUserController extends Controller
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

        return redirect()->back()->with('success','User created successfully.');
    }
}
