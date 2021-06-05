<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StashLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function history_item() {
        return $this->morphOne(HistoryItem::class, 'metable');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'item_id');
    }

    public static function getMissingItemIds($found_ids)
    {
        return static::select('item_id')
            ->where('item_id', '>', 0)
            ->whereNotIn('item_id', $found_ids)
            ->distinct()
            ->get()
            ->pluck('item_id');
    }
}
