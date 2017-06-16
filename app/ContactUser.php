<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ContactUser extends Model
{
    /**
     * The key that prevents SQLSTATE[42703]: Undefined column: 7 ERROR: column "id" does not exist
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'tourist_id', 'guide_id','description', 'message',
    ];
}
