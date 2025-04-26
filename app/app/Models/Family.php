<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $table = 'families';

    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'family_user')
            ->withPivot('role')
            ->withTimestamps();
    }
}
