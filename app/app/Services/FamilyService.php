<?php

namespace app\Services;

use App\Http\Requests\AddMemberRequest;
use App\Http\Requests\FamilyCreateRequest;
use App\Models\Family;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FamilyService
{
    public function getFamily()
    {
        return Family::all();
    }

    public function getUsers()
    {
        return User::all();
    }

    public function createFamily(FamilyCreateRequest $request)
    {
        return Family::create($request->validated());
    }

    public function addMember(AddMemberRequest $request)
    {

    }
}