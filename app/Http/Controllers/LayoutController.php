<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
    public function getLayout()
    {
        $user = $this->hasRole();
        $layout = $user->role == 'admin' ? 'layouts.admin' : 'layouts.app';
        
        // You can also pass additional parameters or conditions if needed
        return $layout;
    }

    private function hasRole()
    {
        return DB::table('users')
            ->leftjoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftjoin('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->select('users.*', 'roles.name as role')
            ->where('users.id', Auth::user()->id)->first();
    }
}
