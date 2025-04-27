<?php

namespace app\Services;

use App\Models\Family;

class FamilyService
{
    public function getFamily()
    {
        return Family::all();
    }
}