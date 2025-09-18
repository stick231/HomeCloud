<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMemberRequest;
use App\Http\Requests\FamilyCreateRequest;
use App\Http\Requests\UpdateFamilyDataRequest;
use App\Models\Family;
use App\Models\FamilyUser;
use App\Models\User;
use App\Services\FamilyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FamilyController extends Controller
{
    public function index(FamilyService $familyService)
    {
        //последние файлы загруженные пользователями этой семьи
        $families = $familyService->getFamily();
        $user = Auth::user();

        return view('family.index', compact('families', 'user'));
    }
    public function create()
    {
        $this->authorize('family-admin-only', Family::class);
        return view('family.create');
    }
    public function store(FamilyCreateRequest $request, FamilyService $familyService)
    {
        $this->authorize('family-admin-only', Family::class);

        $familyService->createFamily($request);

        return redirect()->route('my-family.index')->with('success', 'Семья успешно добавлена!');
    }

    public function edit($id)
    {
        $family = Family::findOrFail($id); // add user data
        $users = User::all();
        // $familyUsers = FamilyUser::where('family_id', $family->id)->get();
        $familyMembersIds = FamilyUser::where('family_id', $family->id)
            ->pluck('user_id')
            ->toArray();
        return view('family.edit', compact('family', 'users', 'familyMembersIds'));
    }

    public function show($id)
    {
        $family = Family::findOrFail($id);
        return view('family.show', compact('family'));
    }

    public function update(UpdateFamilyDataRequest $request, $id)
    {
        $this->authorize('family-admin-only', Family::class);

        $validated = $request->validated(); // create base function for add file (photo profile, data go storage public), and create easy to add in db logic
        Family::find($id)->update($validated);

        return redirect()->route('my-family.index')->with('success', 'Семья успешно обновлена!');
    }
    public function destroy($id, FamilyService $familyService)
    {
        $this->authorize('family-admin-only', Family::class);

        $familyService->deleteFamily($id);

        return redirect()->route('my-family.index')->with('success', 'Семья успешно удалена!');
    }

    public function addMember(AddMemberRequest $request, FamilyService $familyService, $id)
    {
        $familyService->addMember($request, $id);
        
        return redirect()->route('my-family.index')->with('success', 'Данные об участниках семьи успешно обновленны');
    }
}
