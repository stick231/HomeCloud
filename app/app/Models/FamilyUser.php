<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyUser extends Model
{
    protected $table = 'family_user';

    protected $fillable = [
        'family_id',
        'user_id',
        'role',
        'created_at',
        'updated_at'
    ];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
