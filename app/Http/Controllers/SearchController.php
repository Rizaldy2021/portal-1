<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\File;
use App\Models\User;

class SearchController extends Controller
{
    public function search(Request $request) {
        $user = $this->hasRole();

        $search = $request->input('search');

        $result = ['folders' =>[], 'files' => [], 'users' =>[]];
        
        if($user->role == 'admin') {
            $result['folders'] = Folder::where('name', 'like', '%' . $search . '%')->get();
            $result['files'] = File::where('name', 'like', '%' . $search . '%')->get();
            $result['users'] = User::where('name', 'like', '%' . $search . '%')->get();
        } else {
            $result['folders'] = Folder::where('name', 'like', '%' . $search . '%')->where('user_id', Auth::id())->get();
            $result['files'] = File::where('name', 'like', '%' . $search . '%')->where('user_id', Auth::id())->get();
        }

        // dd($result);
        $layoutController = new LayoutController();
        $layout = $layoutController->getLayout();

        return view('search.result', ['result' => $result, 'layout' => $layout]);
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
