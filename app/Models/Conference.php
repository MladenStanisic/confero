<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Conference extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'conference_user_role')->withPivot('role_id')->withTimestamps();
    }

    public function organizer(): Attribute
    {
        return new Attribute(
            fn() => $this->users()->wherePivot('role_id', Role::where('name', 'organizer')->first()->id)->first()->get()
        );

    }

    public function speakers(): Attribute
    {
        return new Attribute(
            fn() => $this->users()->wherePivot('role_id', Role::where('name', 'speaker')->first()->id)
        );

    }

    public function attendees(): Attribute
    {
        return new Attribute(
            fn() => $this->users()->wherePivot('role_id', Role::where('name', 'attendee')->first()->id)->get()
        );
    }

    public function rooms(): hasMany
    {
        return $this->hasMany(ConferenceRoom::class);
    }

    public function evaluations(): hasMany
    {
        return $this->hasMany(ConferenceEvaluation::class);
    }

    public function talks(): hasManyThrough
    {
        return $this->hasManyThrough(Talk::class, ConferenceRoom::class);
    }

    public function subscriptions(): hasMany
    {
        return $this->hasMany(Subscription::class);
    }

}
