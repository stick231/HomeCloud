<?php

namespace App\Services; 

use App\Http\Requests\FileUserRequest;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CloudService
{
    public function uploadFile(FileUserRequest $request)
    {
        $user = Auth::user();
        $file = $request->file('file');
        $visibility = $request->input('visibility');;

        Storage::disk('private')->putFileAs('users/' . $user->id . "/files", $file, $file->getClientOriginalName());
        
        $filePath = 'users/' . $user->id . '/' . $file->getClientOriginalName();
        Storage::disk('private')->putFileAs('users/' . $user->id . '/files', $file, $file->getClientOriginalName());

        File::create([
            'user_id' => $user->id,
            'name' => $file->getClientOriginalName(),
            'path' => $filePath,
            'is_folder' => false,
            'size' => $file->getSize(),
            'visibility' => $visibility,
            'family_ids' => json_encode($request->input('families')),
        ]);
    }

    public function getFilesUsers()
    {
        $user = Auth::user();

        $files = $user->files()->where('is_folder', false)->get();
        return $files;
    }

    public function deleteFile($id)
    {
        $file = File::find($id);
        Storage::disk('private')->delete($file->path);
        $file->delete();
    }

    public function downloadFile($id)
    {
        // logic to diliver
    }
    
}
