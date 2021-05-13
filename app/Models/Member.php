<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Member extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public static function getUniqueNames()
    {
        return static::select('name')
            ->get()
            ->map(function($user) {
                return $user->name;
            });
    }

    public static function deleteByName($name)
    {
        return static::where('name', $name)->delete();
    }
}
