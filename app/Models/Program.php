<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Program extends Model
{
    use HasFactory;

    public function appStatus(): BelongsTo
    {
        return $this->belongsTo(AppStatus::class);
    }
}
