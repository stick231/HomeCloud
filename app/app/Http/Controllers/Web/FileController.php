<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    public function index()
    {
        return view('userFile.home');// должен проверять пользователя и выдавать ему те файлы которые находятся в его папке
    }

    public function create()
    {
// формочка чтобы загрузить файл
    }
    public function store()
    {

// загрузка пути файла в бд и тд 
    }

    // сделать создание папки которая бы к тому отображалась на экране
}

