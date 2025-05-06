<?php

namespace app\Services;

use App\Http\Requests\AddMemberRequest;
use App\Http\Requests\FamilyCreateRequest;
use App\Models\Family;
use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FamilyService
{
    public function getFamily()
    {
        $user = Auth::user();

        if($user->role === 'admin'){
            return Family::all();
        }
        else{
            $families = $user->families;
            return $families ?: collect();
        }
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
        $validated = $request->validated();

        $family = Family::find($validated['family_id']);
        if (!$family) {
            return response()->json(['error' => 'Семья не найдена'], 404);
        }
        $user = User::find($validated['user_id']);
        if (!$user) {
            return response()->json(['error' => 'Пользователь не найден'], 404);
        }
        if ($family->users()->where('user_id', $user->id)->exists()) {
            return response()->json(['error' => 'Пользователь уже в семье'], 400);
        }
        $family->users()->attach($user->id);
    }

    public function deleteFamily($id)
    {
        $family = Family::find($id);
        if(!$family){
            return response()->json(['error' => 'Семья не найдена'], 404); 
        }
        $family->delete();
        return response()->json(['success' => 'Семья успешно удалена'], 200);
    }

    public function getFilesFamily()
    {
        $user = Auth::user();

        $userFamilyIds = $user->families()->pluck('families.id');

        $userInSameFamily = User::whereHas('families', function($query) use ($userFamilyIds) {
            $query->whereIn('families.id', $userFamilyIds);
        })->where('id', '!=', $user->id)->get();
        
        $userIds = $userInSameFamily->pluck('id');
        
        return File::whereIn('visibility', ['family', 'public'])
            ->whereIn('user_id', $userIds)
            ->get();
    }
}