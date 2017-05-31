<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tourist extends Authenticatable
{
    use Notifiable;

    /**
     * The key that prevents SQLSTATE[42703]: Undefined column: 7 ERROR: column "id" does not exist
     * @var string
     */
    protected $primaryKey = 'tourist_id';

    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'first_name', 'family_name', 'nationality', 'phone_number','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
