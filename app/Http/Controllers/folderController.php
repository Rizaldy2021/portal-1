<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Controllers\LayoutController;

class folderController extends Controller
{
    public function index()
    {
        $user = $this->hasRole();

        $result = ['folders' =>[], 'topLevelFolders' => []];

        if ($user->role == 'admin') {
            $result['folders'] = Folder::with(['children','files'])->whereNull('parent_id')->get();
            $result['topLevelFolders'] = Folder::whereNull('parent_id')->get();
        } else {
            $result['folders'] = Folder::with(['children','files'])
                ->whereNull('parent_id')
                ->where('user_id', Auth::id())
                ->get();
        }
// dd($result);
        return $result;
    }

    public function show($id)
    {
        $folder = Folder::with(['children','files'])->findOrFail($id);

        $this->authorizeAccess($folder);

        $folders = Folder::where('parent_id', '=', $id)->get();
        $folderId = $id;

        $layoutController = new LayoutController();
        $layout = $layoutController->getLayout();
        $result['topLevelFolders'] = Folder::whereNull('parent_id')->get();
        return view('folders.show', compact('folder', 'folders' , 'folderId', 'layout', 'result'));
    }

    public function create()
    {
        $parentFolders = Folder::where('user_id', Auth::id())->get();
        $currentFolderId = null;

        return view('folders.create', compact('parentFolders', 'currentFolderId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|String|max:255',
            'description' => 'nullable|String|max:255',
            'parent_id' => 'required',
        ]);

        $userId = Auth::id();

        if ($request->parent_id) {
            $parentFolder = Folder::find($request->parent_id);
            if($parentFolder) {
                $userId = $parentFolder->user_id;
            }
        }

        Folder::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $userId,
            'parent_id' => $request->parent_id ?? null
        ]);
        
        // return redirect()->route('folders.index')->with('success', 'Folder created successfully.');
        return redirect()
        ->back()
        ->with('success', 'Folder created successfully.');
    }

    public function edit(Folder $folder)
    {
        $this->authorizeAccess($folder);

        $parentFolders = Folder::where('user_id', Auth::id())
            ->where('id', '!=', $folder->id)
            ->get();

        return view('folders.edit', compact('folder', 'parentFolders'));
    }
    
    public function update(Request $request, $folder_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $folder = Folder::findOrFail($folder_id);

        $folder->update([
            'name' => $request->name,
        ]);

        // return redirect()->route('folders.index')->with('success', 'Folder updated successfully.');
        return redirect()
        ->back()
        ->with('success', 'Folder renamed successfully.');
    }

    public function destroy(Folder $folder)
    {
        $this->authorizeAccess($folder);

        $folder->delete();

        return redirect()->back()->with('success', 'Folder deleted successfully.');
    }

    private function authorizeAccess(Folder $folder)
    {
        $user = Auth::user();
        $userRole = $this->hasRole();
        if ($folder->user_id != $user->id && $userRole->role != 'admin') {
            abort(403, 'Unauthorized');
        }
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