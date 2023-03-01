<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkSpaceInvitation extends Model
{
    use HasFactory;

    public function workSpace(): BelongsTo
    {
        return $this->belongsTo(WorkSpace::class);
    }
}
