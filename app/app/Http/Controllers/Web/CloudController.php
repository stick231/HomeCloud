<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileUserRequest;
use app\Services\CloudService;

class CloudController extends Controller
{
   
    public function index(CloudService $fileService)
    {
        $files = $fileService->getFilesUsers();
        return view('userFile.home')->with('files', $files);
    }

    public function create()
    {
        return view('userFile.create'); 
    }
    public function store(FileUserRequest $request, CloudService $fileService)
    {
        $fileService->uploadFile($request);
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
    // сделать создание папки которая бы к тому отображалась на экране
}

