<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileUserRequest;
use app\Services\FileService;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    public function index(FileService $fileService)
    {
        $files = $fileService->getFiles();
        return view('userFile.home')->with('files', $files);// должен проверять пользователя и выдавать ему те файлы которые находятся в его папке
    }

    public function create()
    {
        return view('userFile.create'); // здесь будет форма загрузки файла
// формочка чтобы загрузить файл
    }
    public function store(FileUserRequest $request, FileService $fileService)
    {
        $fileService->uploadFile($request);
        return redirect()->route('index')->with('success', 'Файл успешно загружен');
    }

    // сделать создание папки которая бы к тому отображалась на экране
}

