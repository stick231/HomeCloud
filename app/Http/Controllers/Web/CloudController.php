<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileUserRequest;
use App\Models\File;
use App\Services\CloudService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CloudController extends Controller
{
   
    public function index(CloudService $fileService)
    {
        $files = $fileService->getFilesUsers();
        return view('user-files.index')->with('files', $files);
    }

    public function create()
    {
        $user = Auth::user();
        $families = $user->families;
        return view('user-files.create', compact('families')); 
    }
    public function store(FileUserRequest $request, CloudService $fileService)
    {
        if(!$fileService->uploadFile($request)){
            return redirect()->route('my-cloud.index')->with('success', 'ERROR');
        }
        return redirect()->route('my-cloud.index')->with('success', 'Файл успешно загружен');
    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {
        
    }

    public function destroy($id, CloudService $fileService)
    {
        $fileService->deleteFile($id);
        return redirect()->route('my-cloud.index')->with('success', 'Файл успешно удален');
    }

    public function downloadFile($id)
    {
        $file = File::findOrFail($id);
        $filePath = Storage::disk('private')->path($file->path);
        return response()->download($filePath, $file->name);
    }

    public function search()
    {
        return 4;
    }
}

