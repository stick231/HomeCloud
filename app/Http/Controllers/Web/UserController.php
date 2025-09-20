<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserDataRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function edit()
    {
        $user = Auth::user();
        return view('user.edit')->with('user', $user);
    }

    public function update(UpdateUserDataRequest $updateUserDataRequest)
    {
        $user = Auth::user();
        $data = $updateUserDataRequest->validated();
        
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return redirect()->route('my-cloud.index');
    }

    public function destroy()
    {

    }
}
