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
    /**
     * Handle the file upload process.
     */
    public function upload(Request $request): RedirectResponse
    {
        // Validasi input file
        $validated = $request->validate([
            'file' => 'required|file|max:5120', // Maksimal 5 MB
            'folder_id' => 'nullable|integer', // Folder ID opsional
        ]);

        // Ambil file yang diunggah
        $uploadedFile = $request->file('file');

        // Simpan file secara permanen
        $filePath = $this->storePermanent($uploadedFile, $validated['folder_id'] ?? null);

        // Redirect dengan pesan sukses
        return redirect()
            ->back()
            ->with('success', 'File uploaded successfully. File path: ' . $filePath);
    }

    /**
     * Store file permanently in the storage and save metadata to the database.
     */
    private function storePermanent(UploadedFile $file, ?int $folderId = null): string
    {
        // Simpan file ke folder 'uploads'
        $filePath = $file->store('test');

        // Dapatkan informasi file
        $fileName = $file->getClientOriginalName();
        $fileType = $file->getClientMimeType();
        $fileSize = $file->getSize();

        // Simpan metadata file ke database
        DB::table('files')->insert([
            'name' => $fileName,
            'path' => $filePath,
            'type' => $fileType,
            'size' => $fileSize,
            'user_id' => Auth::check() ? Auth::id() : null, // Gunakan null jika pengguna tidak login
            'folder_id' => $folderId ?? 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $filePath;
    }
}
