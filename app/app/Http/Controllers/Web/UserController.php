<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('user.index');
    }

    public function store()
    {

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

    public function destroy()
    {

    }
}
