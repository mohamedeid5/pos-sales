<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TreasuriesDelivery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function treasury(): BelongsTo
    {
        return $this->belongsTo(Treasury::class);
    }
}
