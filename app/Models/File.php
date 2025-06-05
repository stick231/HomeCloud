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
        'created_at',
        'updated_at'
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
