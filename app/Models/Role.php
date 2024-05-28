<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'roles';

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
