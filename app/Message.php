<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['message'];

    /**
     * A message belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        /** @noinspection PhpUndefinedClassInspection */
        return $this->belongsTo(Guide::class);
    }
}