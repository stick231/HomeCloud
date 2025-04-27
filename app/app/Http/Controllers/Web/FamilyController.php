<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Family;
use app\Services\FamilyService;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index(FamilyService $familyService)
    {
        $families = $familyService->getFamily();
        return view('family.index')->with('families', $families);
    }
    public function create()
    {
        return view('family.create');
    }
    public function store(Request $request)
    {
        // Здесь будет логика для сохранения данных о семье
        // Например, валидация и сохранение в базу данных
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
}
