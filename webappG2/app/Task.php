<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public static function not_finished()
    {
        return static::where('finished', 0)->get();
    }

    public static function finished()
    {
        return static::where('finished', 1)->get();
    }
}
