<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Folder;
use Illuminate\Support\Facades\DB;

class CheckFolderAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user) {
            return abort(401, 'Unauthorized');
        }

        $folderId = $request->route('id');

        $folder = Folder::find($folderId);

        $userRole = $this->hasRole();

        if ($folder->user_id != $user->id && $userRole->role != 'admin') {
            return abort(403, 'Forbidden');
        }

        return $next($request);
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
