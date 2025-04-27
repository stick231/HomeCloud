<?php

namespace app\Services; 

use App\Http\Requests\FileUserRequest;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public function uploadFile(FileUserRequest $request)
    {
        $user = Auth::user();
        $file = $request->file('file');
        Storage::disk('private')->putFileAs('users/' . $user->id, $file, $file->getClientOriginalName());
        
        File::create([
            'user_id' => $user->id,
            'name' => $file->getClientOriginalName(),
            'path' => 'users/' . $user->id . '/' . $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'is_folder' => false,
            'size' => $file->getSize(),
            'visibility' => $request->visibility,
        ]);
    }

    public function getFiles()
    {
        $user = Auth::user();

        $files = File::where('user_id', $user->id)->get();
        return $files;
    }
}
