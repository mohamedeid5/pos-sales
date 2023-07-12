<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemCard extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function itemCardType($type): string
    {
        if ($type == 1) {
            return 'مخزني';
        } elseif ($type == 2) {
            return 'استهلاكي بصلاحية';
        } elseif ($type == 3){
            return 'عهدة';
        } else {
            return 'غير محدد';
        }
    }

    public function itemCategories(): BelongsTo
    {
        return $this->belongsTo(ItemCategory::class);
    }

    public function parentItemCard(): BelongsTo
    {
        return $this->belongsTo(ItemCard::class);
    }

    public function uom(): BelongsTo
    {
        return $this->belongsTo(Uom::class);
    }

    public function retailUom(): BelongsTo
    {
        return $this->belongsTo(Uom::class);
    }
}
