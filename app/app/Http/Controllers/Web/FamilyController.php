<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMemberRequest;
use App\Http\Requests\FamilyCreateRequest;
use App\Models\Family;
use app\Services\FamilyService;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index(FamilyService $familyService)
    {
        $families = $familyService->getFamily();
        $users = $familyService->getUsers();
        return view('family.index', compact('families', 'users'));
    }
    public function create()
    {
        return view('family.create');
    }
    public function store(FamilyCreateRequest $request, FamilyService $familyService)
    {
        $familyService->createFamily($request);

        return redirect()->route('family.index')->with('success', 'Семья успешно добавлена!');
    }

    public function show($id)
    {
        // Здесь будет логика для отображения информации о конкретной семье
        return view('family.show', compact('id'));
    }
    public function edit($id)
    {
        // Здесь будет логика для редактирования информации о семье
        return view('family.edit', compact('id'));
    }
    public function update(Request $request, $id)
    {
        // Здесь будет логика для обновления информации о семье
        return redirect()->route('family.index')->with('success', 'Семья успешно обновлена!');
    }
    public function destroy($id)
    {
        // Здесь будет логика для удаления информации о семье
        return redirect()->route('family.index')->with('success', 'Семья успешно удалена!');
    }

    public function addMember(AddMemberRequest $request, FamilyService $familyService)
    {
        $familyService->addMember($request);

        return redirect()->route('family.index')->with('success', 'Пользователь успешно добавлен в семью!');
    }
}
