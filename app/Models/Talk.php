<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Talk extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'start_time', 'end_time'];

    public function conferenceRoom(): BelongsTo
    {
        return $this->belongsTo(ConferenceRoom::class);
    }

    public function speaker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'speaker_id');
    }

    public function votes(): hasMany
    {
        return $this->hasMany(TalkVote::class);
    }

    public function slides(): hasMany
    {
        return $this->hasMany(TalkSlide::class);
    }
}
