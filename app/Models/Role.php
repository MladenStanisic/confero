<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class, 'conference_user_role')
            ->withPivot('conference_id');
    }

    public function conferences(): belongsToMany
    {
        return $this->belongsToMany(Conference::class, 'conference_user_role')
            ->withPivot('user_id');
    }
}
