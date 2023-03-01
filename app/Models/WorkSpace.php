<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkSpace extends Model
{
    use HasFactory;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function workSpaceInvitation(): HasMany
    {
        return $this->hasMany(WorkSpaceInvitation::class);
    }

    public function appstatus(): HasMany
    {
        return $this->hasMany(AppStatus::class);
    }

}
