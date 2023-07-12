<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function addedBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'added_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    public function itemCards(): HasMany
    {
        return $this->hasMany(ItemCard::class);
    }
}
