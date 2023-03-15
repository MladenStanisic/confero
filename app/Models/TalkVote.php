<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TalkVote extends Model
{
    use HasFactory;

    public function talk(): belongsTo
    {
        return $this->belongsTo(Talk::class);
    }

    public function attendee(): belongsTo
    {
        return $this->belongsTo(User::class, 'attendee_id');
    }
}
