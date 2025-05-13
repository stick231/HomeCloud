<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $user = Auth::user();
        return view('user.index')->with('user', $user);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit')->with('user', $user);
    }

    public function update()
    {
        
    }

    public function destroy()
    {

    }
}
