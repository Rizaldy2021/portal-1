<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|array',
            'file.*' => 'file|max:5120',
            'folder_id' => 'nullable|integer',
        ]);

        $folderId = $validated['folder_id'] ?? null;
        $uploadedFile = $request->file('file');

        $filePath = [];
        foreach ($request->file('file') as $uploadedFile) {
            $filePath[] = $this->storePermanent($uploadedFile, $folderId);;
        }
        
        $filePathsString = implode(', ', $filePath);
        return redirect()
            ->back()
            ->with('success', 'File uploaded successfully. File path: ' . $filePathsString);

        
    }

    private function storePermanent(UploadedFile $file, ?int $folderId = null): string
    {
        $filePath = $file->store('test', 'public');

        $fileName = $file->getClientOriginalName();
        $fileType = $file->getClientMimeType();
        $fileSize = $file->getSize();

        DB::table('files')->insert([
            'name' => $fileName,
            'path' => $filePath,
            'type' => $fileType,
            'size' => $fileSize,
            'user_id' => Auth::check() ? Auth::id() : null,
            'folder_id' => $folderId ?? 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $filePath;
    }
}
