<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getUniqueItemIds()
    {
        return static::select('item_id')
            ->where('item_id', '>', 0)
            ->distinct()
            ->get()
            ->pluck('item_id');
    }
}
