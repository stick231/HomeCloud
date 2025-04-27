<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('user.index')->with('user', $user);
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
