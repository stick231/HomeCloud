<?php

namespace app\Services;

use App\Http\Requests\AddMemberRequest;
use App\Http\Requests\FamilyCreateRequest;
use App\Models\Family;
use App\Models\FamilyUser;
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
        $data = $request->validated();
        $data['owner_id'] = Auth::id();

        $family = Family::create($data);
        // add exception
        $family->users()->attach($data['owner_id']);

        return response()->json(['success' => 'Family successfully created']);
    }

    public function addMember(AddMemberRequest $request, $id)
    {
        $family = Family::findOrFail($id);
        $userIds = $request->input('user_ids', []);
        
        $family->users()->syncWithPivotValues(
            $userIds, 
            ['family_id' => $id, 'role' => 'user']
        );
    }

    public function deleteFamily($id)
    {
        $family = Family::find($id);
        if(!$family){
            return response()->json(['error' => 'Семья не найдена'], 404); 
        }
        $family->forceDelete();
        return response()->json(['success' => 'Семья успешно удалена'], 200);
    }

    public function getFilesFamily()
    {
        $user = Auth::user();
        $families = $user->families;

        $filesWithFamily = $families->map(function($family) {
            $files = File::where('visibility', 'family')
                ->whereJsonContains('family_ids', (string)$family->id)
                ->with('user')
                ->get();
            $family->setRelation('files', $files);
            return $family;
        });
        return $filesWithFamily;
    }
}