<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Services\CloudService;
use App\Services\FamilyService;
use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FamilyFilesController extends Controller
{
    public function index(FamilyService $familyService)
    {
        $familyfiles = $familyService->getFilesFamily();
        return view('family-files.index')->with('familyFiles', $familyfiles);
    }

    public function downloadFile($id)
    {
        $file = File::findOrFail($id);
        $filePath = Storage::disk('private')->path($file->path);
        return response()->download($filePath, $file->name);
    }
}
