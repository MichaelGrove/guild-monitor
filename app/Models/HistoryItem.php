<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getLatestId()
    {
        return static::latest()->first()->log_id ?? null;
    }

    public function metable()
    {
        return $this->morphTo();
    }
}
