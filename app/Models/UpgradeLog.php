<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpgradeLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function history_item() {
        return $this->morphOne(HistoryItem::class, 'metable');
    }
}
