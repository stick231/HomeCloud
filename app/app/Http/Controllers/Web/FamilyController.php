<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMemberRequest;
use App\Http\Requests\FamilyCreateRequest;
use App\Models\Family;
use App\Models\FamilyUser;
use app\Services\FamilyService;
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
        $family = Family::findOrFail($id);
        return view('family.edit', compact('family'));
    }

    public function show($id)
    {
        $family = Family::findOrFail($id);
        return view('family.show', compact('family'));
    }

    public function update(Request $request, $id)
    {
        dd($request);
        $this->authorize('family-admin-only', Family::class);

        return redirect()->route('my-family.index')->with('success', 'Семья успешно обновлена!');
    }
    public function destroy($id, FamilyService $familyService)
    {
        $this->authorize('family-admin-only', Family::class);

        $familyService->deleteFamily($id);

        return redirect()->route('my-family.index')->with('success', 'Семья успешно удалена!');
    }

    public function addMember(AddMemberRequest $request, FamilyService $familyService)
    {
        $familyService->addMember($request);

        return redirect()->route('my-family.index')->with('success', 'Пользователь успешно добавлен в семью!');
    }
}
