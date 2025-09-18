<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

    protected $fillable = [
        'user_id',
        'name',
        'path',
        'size',
        'type',
        'visibility',
        'family_ids',
        'created_at',
        'updated_at'
    ];
    
    protected $casts = [
        'family_ids' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }
    public function familyUser()
    {
        return $this->belongsTo(FamilyUser::class);
    }
}
